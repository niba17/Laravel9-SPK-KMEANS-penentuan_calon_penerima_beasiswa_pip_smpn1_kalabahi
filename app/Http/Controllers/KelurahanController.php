<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelurahanController extends Controller
{
    // public function index()
    // {
    //     $kelurahan = Kelurahan::with(['kecamatan'])->get();

    //     session()->forget('errMessage');
    //     return view('kelurahan', ['kelurahan' => $kelurahan]);
    // }

    public function create()
    {
        return view('add.kelurahan-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:kelurahan|max:50|required';
        $messages['nama.unique'] = 'Nama kelurahan sudah ada!';
        $messages['nama.max'] = 'Nama Kelurahan tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama Kelurahan wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Kelurahan::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kelurahan berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal ditambahkan!');
        }

        return redirect('/kecamatan_kelurahan');
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);

        return view('edit.kelurahan-edit', ['kelurahan' => $kelurahan]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kelurahan = Kelurahan::findOrFail($id);

        if ($request->nama != $kelurahan->nama) {
            $rules['nama'] = 'unique:kelurahan|max:50|required';
            $messages['nama.unique'] = 'Nama Kelurahan Sudah ada!';
            $messages['nama.required'] = 'Kelurahan wajib Diisi!';
            $messages['nama.max'] = 'Nama Kelurahan tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $kelurahan->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal diubah!');
        }

        return redirect('/kecamatan_kelurahan');
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $result = $kelurahan->delete();

        if ($result) {
            Session::flash('succMessage', 'Kelurahan berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kelurahan gagal dihapus!');
        }

        return redirect('/kecamatan_kelurahan');
    }

    public function request()
    {
        $kecamatan = Kecamatan::with(['kecamatan_kelurahan.kelurahan'])->get();
        $kelurahan = Kelurahan::with(['kecamatan_kelurahan.kecamatan'])->get();

        return response()->json([$kecamatan, $kelurahan]);
    }
}