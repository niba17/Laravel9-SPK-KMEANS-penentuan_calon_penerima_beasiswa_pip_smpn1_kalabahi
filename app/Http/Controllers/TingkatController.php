<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Tingkat;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TingkatController extends Controller
{
    public function index(Type $var = null)
    {
        $tingkat = Tingkat::with(['kelas'])->get();
        $kelas = Kelas::with(['tingkat'])->get();

        // dd($tingkat);

        // session()->forget('errMessage');
        return view('tingkat', ['tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function create()
    {
        $tingkat = Tingkat::all();
        return view('add.tingkat-add', ['tingkat' => $tingkat]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];
        $rules['nama'] = 'unique:tingkat|max:50|required';
        $messages['nama.unique'] = 'Nama tingkat sudah ada!';
        $messages['nama.max'] = 'Nama tingkat tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama tingkat wajib diisi!';

        $request->validate($rules, $messages);

        $kasus = Tingkat::create($request->all());

        if ($kasus) {
            Session::flash('succMessage', 'Tingkat berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Tingkat gagal ditambahkan!');
        }

        return redirect('/tingkat_kelas');
    }

    public function edit($id)
    {
        $tingkat = Tingkat::findOrFail($id);

        return view('edit.tingkat-edit', ['tingkat' => $tingkat]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $tingkat = Tingkat::findOrFail($id);

        if ($request->nama != $tingkat->nama) {
            $rules['nama'] = 'unique:tingkat|max:50|required';
            $messages['nama.unique'] = 'Nama Tingkat Sudah ada!';
            $messages['nama.required'] = 'Tingkat wajib Diisi!';
            $messages['nama.max'] = 'Nama Tingkat tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $result = $tingkat->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Tingkat berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Tingkat gagal diubah!');
        }

        return redirect('/tingkat_kelas');
    }

    public function destroy($id)
    {
        $tingkat = Tingkat::findOrFail($id);
        $result = $tingkat->delete();

        if ($result) {
            Session::flash('succMessage', 'Tingkat berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Tingkat gagal dihapus!');
        }

        return redirect('/tingkat_kelas');
    }

    public function request()
    {
        $tingkat = Tingkat::with(['tingkat_kelas.kelas'])->get();
        $kelas = Kelas::with(['tingkat_kelas.tingkat'])->get();

        return response()->json([$tingkat, $kelas]);
    }
}