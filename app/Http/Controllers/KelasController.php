<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    // public function index()
    // {
    //     $kelas = Kelas::with(['kecamatan'])->get();

    //     session()->forget('errMessage');
    //     return view('kelas', ['kelas' => $kelas]);
    // }

    public function create()
    {
        return view('add.kelas-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:kelas|max:50|required';
        $messages['nama.unique'] = 'Nama kelas sudah ada!';
        $messages['nama.max'] = 'Nama Kelas tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama Kelas wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Kelas::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Kelas berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kelas gagal ditambahkan!');
        }

        return redirect('/tingkat_kelas');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('edit.kelas-edit', ['kelas' => $kelas]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kelas = Kelas::findOrFail($id);

        if ($request->nama != $kelas->nama) {
            $rules['nama'] = 'unique:kelas|max:50|required';
            $messages['nama.unique'] = 'Nama Kelas Sudah ada!';
            $messages['nama.required'] = 'Kelas wajib Diisi!';
            $messages['nama.max'] = 'Nama Kelas tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $kelas->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Kelas berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kelas gagal diubah!');
        }

        return redirect('/tingkat_kelas');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $result = $kelas->delete();

        if ($result) {
            Session::flash('succMessage', 'Kelas berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kelas gagal dihapus!');
        }

        return redirect('/tingkat_kelas');
    }

    public function request()
    {
        $kecamatan = Kecamatan::with(['kecamatan_kelurahan.kelas'])->get();
        $kelas = Kelas::with(['kecamatan_kelurahan.kecamatan'])->get();

        return response()->json([$kecamatan, $kelas]);
    }
}