<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\KecamatanKelurahan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KecamatanKelurahanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::with(['kecamatan_kelurahan'])->get();
        $kelurahan = Kelurahan::get();

        session()->forget(['succKMEANSMessage', 'errKMEANSMessage']);

        return view('kecamatan_kelurahan', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function create()
    {
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();

        return view('add.kecamatan_kelurahan-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
        ];

        $messages = [
            'kecamatan_id.required' => 'Kecamatan wajib dipilih!',
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = KecamatanKelurahan::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/kecamatan_kelurahan');
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();
        $kecamatan_kelurahan = KecamatanKelurahan::with(['kecamatan', 'kelurahan'])->findOrFail($id);

        return view('edit.kecamatan_kelurahan-edit', ['kecamatan_kelurahan' => $kecamatan_kelurahan, 'kelurahan' => $kelurahan, 'kecamatan' => $kecamatan]);
    }

    public function update(Request $request, $id)
    {
        $kecamatan_kelurahan = KecamatanKelurahan::findOrFail($id);

        $rules = [
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
        ];

        $messages = [
            'kecamatan_id.required' => 'Kecamatan wajib dipilih!',
            'kelurahan_id.required' => 'Kelurahan wajib dipilih!',
        ];

        $request->validate($rules, $messages);

        $result = $kecamatan_kelurahan->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/kecamatan_kelurahan');
    }

    public function destroy($id)
    {
        $kecamatan_kelurahan = KecamatanKelurahan::findOrFail($id);
        $result = $kecamatan_kelurahan->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/kecamatan_kelurahan');
    }
}