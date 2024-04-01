<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SiswaKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaKriteriaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['siswa_kriteria.kriteria', 'kecamatan', 'kelurahan', 'tingkat', 'kelas'])->get();
        $kriteria = Kriteria::get();

        session()->forget(['succKMEANSMessage', 'errKMEANSMessage']);

        return view('siswa_kriteria', ['siswa' => $siswa, 'kriteria' => $kriteria]);
    }

    public function create()
    {
        $siswa = Siswa::get();
        return view('add.siswa_kriteria-add', ['siswa' => $siswa]);
    }

    public function store(Request $request)
    {
        $rules = [
            'siswa_id' => 'required',
            'kriteria_id' => 'required',
        ];

        $messages = [
            'siswa_id.required' => 'Siswa wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = SiswaKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/siswa_kriteria');
    }

    public function set($siswa_id)
    {
        $siswa = Siswa::with(['siswa_kriteria'])->findOrFail($siswa_id);
        $kriteria = Kriteria::get();

        // dd($siswa);

        return view('set.siswa_kriteria-set', ['siswa' => $siswa, 'kriteria' => $kriteria]);
    }

    public function apply(Request $request)
    {
        // dd($request->all());
        $kriteria = Kriteria::get();
        $siswa = Siswa::with(['siswa_kriteria'])->findOrFail($request->siswa_id);
        $siswa_kriteria = SiswaKriteria::with(['siswa'])->get();
        $rules['siswa_id'] = 'required';

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            $rules['K_' . $value_kriteria->id] = 'required';

        }

        $messages['siswa_id.required'] = 'Siswa wajib dipilih!';

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            $messages['K_' . $value_kriteria->id . '.required'] = $value_kriteria->nama . ' wajib diisi!';

        }

        $request->validate($rules, $messages);

        $arr = [];
        $arr_req = $request->all();

        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            $arr[$key_kriteria] = [
                'siswa_id' => $request->siswa_id,
                'kriteria_id' => $value_kriteria->id,
                'bobot' => $arr_req['K_' . $value_kriteria->id]
            ];

        }

        $siswa_kriteria_arr = [];
        foreach ($siswa_kriteria as $key_siswa_kriteria => $value_siswa_kriteria) {

            $siswa_kriteria_arr[$key_siswa_kriteria] = [
                'id' => $value_siswa_kriteria->id,
                'siswa_id' => $value_siswa_kriteria->siswa_id,
                'kriteria_id' => $value_siswa_kriteria->kriteria_id,
                'bobot' => $value_siswa_kriteria->bobot
            ];

        }

        // dd($arr);
        $result = [];
        foreach ($kriteria as $key_kriteria => $value_kriteria) {

            $siswa_kriteria_id = 0;
            $kriteria_miss = true;
            foreach ($siswa_kriteria_arr as $key_siswa_kriteria_arr => $value_siswa_kriteria_arr) {

                if ($arr[$key_kriteria]['kriteria_id'] == $value_siswa_kriteria_arr['kriteria_id']) {

                    if ($request->siswa_id == $value_siswa_kriteria_arr['siswa_id']) {

                        if ($arr[$key_kriteria]['kriteria_id'] == $value_kriteria->id) {

                            $siswa_kriteria_id = $value_siswa_kriteria_arr['id'];
                            $kriteria_miss = false;

                        }

                    }

                }

            }

            if ($kriteria_miss == true) {

                $result = SiswaKriteria::create($arr[$key_kriteria]);

            } else {

                $siswa_kriteria = SiswaKriteria::findOrFail($siswa_kriteria_id);
                $result = $siswa_kriteria->update($arr[$key_kriteria]);

            }



        }

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/siswa_kriteria');
    }

    public function edit($id)
    {
        $siswa = Siswa::get();
        $kriteria = Kriteria::with(['siswa_kriteria.kriteria'])->get();

        $siswa_kriteria = SiswaKriteria::with(['siswa'])->findOrFail($id);


        return view('edit.siswa_kriteria-edit', ['siswa_kriteria' => $siswa_kriteria, 'siswa' => $siswa, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $siswa_kriteria = SiswaKriteria::findOrFail($id);

        $rules = [
            'siswa_id' => 'required',
            'kriteria_id' => 'required',
        ];

        $messages = [
            'siswa_id.required' => 'Siswa wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $siswa_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/siswa_kriteria');
    }

    public function destroy($id)
    {
        $siswa_kriteria = SiswaKriteria::findOrFail($id);
        $result = $siswa_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/siswa_kriteria');
    }
}