<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SiswaSubKriteria;
use App\Models\SubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaSubKriteriaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['siswa_sub_kriteria.kriteria', 'siswa_sub_kriteria.sub_kriteria.kriteria_sub_kriteria', 'kecamatan', 'kelurahan', 'tingkat', 'kelas'])->get();
        $siswa_sub_kriteria = SubKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $kriteria = Kriteria::get();

        session()->forget(['succKMEANSMessage', 'errKMEANSMessage']);

        return view('siswa_sub_kriteria', ['siswa' => $siswa, 'siswa_sub_kriteria' => $siswa_sub_kriteria, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria]);
    }

    public function create()
    {
        $siswa = Siswa::get();
        return view('add.siswa_sub_kriteria-add', ['siswa' => $siswa]);
    }

    public function store(Request $request)
    {
        $rules = [
            'siswa_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'siswa_id.required' => 'Siswa wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = SiswaSubKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/siswa_sub_kriteria');
    }

    public function edit($id)
    {
        $siswa = Siswa::get();
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria', 'siswa_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria'])->get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::get();
        $siswa_sub_kriteria = SiswaSubKriteria::with(['siswa', 'sub_kriteria.kriteria_sub_kriteria'])->findOrFail($id);
        $siswa_sub_kriteria_get = SiswaSubKriteria::get();

        return view('edit.siswa_sub_kriteria-edit', ['siswa_sub_kriteria' => $siswa_sub_kriteria, 'sub_kriteria' => $sub_kriteria, 'siswa' => $siswa, 'kriteria' => $kriteria, 'kriteria_sub_kriteria' => $kriteria_sub_kriteria, 'siswa_sub_kriteria_get' => $siswa_sub_kriteria_get]);
    }

    public function update(Request $request, $id)
    {
        $siswa_sub_kriteria = SiswaSubKriteria::findOrFail($id);
        // dd($request->all());
        $rules = [
            'siswa_id' => 'required',
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
        ];

        $messages = [
            'siswa_id.required' => 'Siswa wajib dipilih!',
            'kriteria_id.required' => 'Kriteria wajib dipilih!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $siswa_sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/siswa_sub_kriteria');
    }

    public function destroy($id)
    {
        $siswa_sub_kriteria = SiswaSubKriteria::findOrFail($id);
        $result = $siswa_sub_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/siswa_sub_kriteria');
    }
}