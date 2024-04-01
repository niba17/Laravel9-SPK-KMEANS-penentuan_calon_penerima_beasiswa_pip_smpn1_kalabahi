<?php

namespace App\Http\Controllers;

use App\Models\Tingkat;
use App\Models\TingkatKelas;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TingkatKelasController extends Controller
{
    public function index()
    {
        $tingkat = Tingkat::with(['tingkat_kelas'])->get();
        $kelas = Kelas::get();

        session()->forget(['succKMEANSMessage', 'errKMEANSMessage']);

        return view('tingkat_kelas', ['tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function create()
    {
        $tingkat = Tingkat::get();
        $kelas = Kelas::get();

        return view('add.tingkat_kelas-add', ['tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        $rules = [
            'tingkat_id' => 'required',
            'kelas_id' => 'required',
        ];

        $messages = [
            'tingkat_id.required' => 'Tingkat wajib dipilih!',
            'kelas_id.required' => 'Kelas wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = TingkatKelas::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/tingkat_kelas');
    }

    public function edit($id)
    {
        $tingkat = Tingkat::get();
        $kelas = Kelas::get();
        $tingkat_kelas = TingkatKelas::with(['tingkat', 'kelas'])->findOrFail($id);

        return view('edit.tingkat_kelas-edit', ['tingkat_kelas' => $tingkat_kelas, 'kelas' => $kelas, 'tingkat' => $tingkat]);
    }

    public function update(Request $request, $id)
    {
        $tingkat_kelas = TingkatKelas::findOrFail($id);

        $rules = [
            'tingkat_id' => 'required',
            'kelas_id' => 'required',
        ];

        $messages = [
            'tingkat_id.required' => 'Tingkat wajib dipilih!',
            'kelas_id.required' => 'Kelas wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $tingkat_kelas->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/tingkat_kelas');
    }

    public function destroy($id)
    {
        $tingkat_kelas = TingkatKelas::findOrFail($id);
        $result = $tingkat_kelas->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/tingkat_kelas');
    }
}