<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaController extends Controller
{
    public function index(Type $var = null)
    {
        $kriteria = Kriteria::get();

        return view('kriteria', ['kriteria' => $kriteria]);
    }

    public function create()
    {
        return view('add.kriteria-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:kriteria|max:100|required';
        $messages['nama.unique'] = 'Kriteria sudah ada!';
        $messages['nama.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Kriteria wajib diisi!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kriteria = Kriteria::create($arrayAdd->all());

        if ($kriteria) {
            Session::flash('succMessage', 'Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('edit.kriteria-edit', ['kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $kriteria = Kriteria::findOrFail($id);

        if ($request->nama != $kriteria->nama) {
            $rules['nama'] = 'unique:kriteria|max:100|required';
            $messages['nama.unique'] = 'Kriteria Sudah ada!';
            $messages['nama.required'] = 'Kriteria wajib Diisi!';
            $messages['nama.max'] = 'Kriteria tidak boleh lebih dari :max karakter!';
        }

        $request->validate($rules, $messages);

        $arrayUp = [];
        $arrayUp = $request;

        $result = $kriteria->update($arrayUp->all());

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal diubah!');
        }

        return redirect('/kriteria');
    }

    // public function request()
    // {
    //     $kriteria = Kriteria::with(['sub_kriteria.bobot_siswa'])->get();
    //     return response()->json([$kriteria]);
    // }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Kriteria gagal dihapus!');
        }

        return redirect('/kriteria');
    }

    public function request()
    {
        $kriteria = Kriteria::get();

        return response()->json([$kriteria]);
    }

    public function request_siswa()
    {
        $kriteria = Kriteria::get();

        return response()->json([$kriteria]);
    }
}