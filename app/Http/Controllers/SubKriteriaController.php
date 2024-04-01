<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubKriteriaController extends Controller
{
    public function create()
    {
        $kriteria = Kriteria::get();
        return view('add.sub_kriteria-add', ['kriteria' => $kriteria]);
    }

    // public function validator_add(Request $request)
    // {
    //     $arrayAdd = [];
    //     $arrayAdd = $request;

    //     $rules = [];
    //     $messages = [];
    //     $rules['nama'] = 'max:50|required';
    //     $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
    //     $messages['nama.required'] = 'Nama wajib diisi!';

    //     $request->validate($rules, $messages);

    //     $sub_kriteria = SubKriteria::get();

    //     if ($valid == true) {
    //         return $this->store($request);
    //     } else {
    //         $error = \Illuminate\Validation\ValidationException::withMessages([
    //             'nama' => ['Sub kriteria sudah ada!']
    //         ]);
    //         throw $error;
    //     }

    // }

    public function store(Request $request)
    {

        $arrayAdd = [];
        $arrayAdd = $request;

        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:sub_kriteria|max:50|required';
        $messages['nama.unique'] = 'Nama sudah ada!';
        $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama wajib diisi!';

        $request->validate($rules, $messages);

        $result = SubKriteria::create($arrayAdd->all());

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal ditambahkan!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function edit($id)
    {
        // $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::findOrFail($id);
        return view('edit.sub_kriteria-edit', ['sub_kriteria' => $sub_kriteria]);
    }

    // public function validator_edit(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $rules = [];
    //     $messages = [];

    //     $sub_kriteria = SubKriteria::findOrFail($id);

    //     if ($sub_kriteria->nama != $request->nama) {
    //         $rules['nama'] = 'max:50|required';
    //         $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
    //         $messages['nama.required'] = 'Nama wajib diisi!';
    //     }

    //     if ($sub_kriteria->kriteria_id != $request->kriteria_id) {
    //         $rules['kriteria_id'] = 'required';
    //         $messages['kriteria_id.required'] = 'Nama wajib diisi!';
    //     }

    //     if ($sub_kriteria->bobot != $request->bobot) {
    //         $rules['bobot'] = 'required|numeric|gte:1|lte:100|max:100';
    //         $messages['bobot.required'] = 'Bobot kriteria wajib diisi!';
    //         $messages['bobot.numeric'] = 'Bobot kriteria harus berupa angka!';
    //         $messages['bobot.gte'] = 'Bobot kriteria minimal adalah 1!';
    //         $messages['bobot.lte'] = 'Bobot kriteria maksimal adalah 100!';
    //         $messages['bobot.max'] = 'Bobot kriteria tidak boleh lebih dari :max karakter!';
    //     }

    //     $request->validate($rules, $messages);

    //     $arrayUp = [];
    //     $arrayUp = $request;

    //     // if ($sub_kriteria->bobot != $request->bobot) {
    //     //     $arrayUp['bobot'] = $arrayUp['bobot'] / 100;
    //     // }

    //     $sub_kriteria_all = SubKriteria::get();

    //     $valid = true;
    //     if ($sub_kriteria->nama != $request->nama) {
    //         foreach ($sub_kriteria_all as $key => $value) {
    //             if ($request->nama == $value->nama && $request->kriteria_id == $value->kriteria_id) {
    //                 $valid = false;
    //             }
    //         }
    //     }

    //     if ($valid == true) {
    //         return $this->update($arrayUp, $id);
    //     } else {
    //         $error = \Illuminate\Validation\ValidationException::withMessages([
    //             'nama' => ['Sub kriteria sudah ada!']
    //         ]);
    //         throw $error;
    //     }

    // }

    public function update(Request $request, $id)
    {
        $sub_kriteria = SubKriteria::findOrFail($id);

        $rules = [];
        $messages = [];

        if ($sub_kriteria->nama != $request->nama) {
            $rules['nama'] = 'unique:sub_kriteria|max:50|required';
            $messages['nama.unique'] = 'Nama sudah ada!';
            $messages['nama.max'] = 'Nama tidak boleh lebih dari :max karakter!';
            $messages['nama.required'] = 'Nama wajib diisi!';
        }

        $request->validate($rules, $messages);

        $result = $sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Sub Kriteria berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Sub Kriteria gagal diubah!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function destroy($id)
    {
        $kriteria = SubKriteria::findOrFail($id);
        $result = $kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Sub kriteria berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Sub kriteria gagal dihapus!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function request()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria.sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::with(['kriteria_sub_kriteria.kriteria'])->get();

        return response()->json([$sub_kriteria, $kriteria]);
    }

    public function siswa_request()
    {
        $siswa = Siswa::with(['siswa_sub_kriteria.kriteria'])->get();
        $kriteria = Kriteria::with(['siswa_sub_kriteria.siswa'])->get();

        return response()->json([$kriteria, $siswa]);
    }
}