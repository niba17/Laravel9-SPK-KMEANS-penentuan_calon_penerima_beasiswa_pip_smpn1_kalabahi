<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaSubKriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KriteriaSubKriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::with(['kriteria_sub_kriteria'])->get();
        $sub_kriteria = SubKriteria::get();

        session()->forget(['succKMEANSMessage', 'errKMEANSMessage']);

        return view('kriteria_sub_kriteria', ['kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    }

    public function create()
    {
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();

        return view('add.kriteria_sub_kriteria-add', ['kriteria' => $kriteria, 'sub_kriteria' => $sub_kriteria]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
            'bobot' => 'required|gt:-1|lte:10|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib diisi!',
            'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',
            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gt' => 'Bobot minimal adalah 0!',
            'bobot.lte' => 'Bobot harus kurang dari atau sama dengan 10!',
        ];

        $request->validate($rules, $messages);

        $result = KriteriaSubKriteria::create($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Relasi gagal ditambahkan!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::get();
        $sub_kriteria = SubKriteria::get();
        $kriteria_sub_kriteria = KriteriaSubKriteria::with(['kriteria', 'sub_kriteria'])->findOrFail($id);

        return view('edit.kriteria_sub_kriteria-edit', ['kriteria_sub_kriteria' => $kriteria_sub_kriteria, 'sub_kriteria' => $sub_kriteria, 'kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria_sub_kriteria = KriteriaSubKriteria::findOrFail($id);
        // dd($request->all());

        $rules = [
            'kriteria_id' => 'required',
            'sub_kriteria_id' => 'required',
            'bobot' => 'required|gt:-1|lte:10|numeric',
        ];

        $messages = [
            'kriteria_id.required' => 'Kriteria wajib diisi!',

            'sub_kriteria_id.required' => 'Sub Kriteria wajib diisi!',

            'bobot.required' => 'Bobot wajib diisi!',
            'bobot.gt' => 'Bobot minimal adalah 0!',
            'bobot.lte' => 'Bobot harus kurang dari atau sama dengan 10!',

        ];

        $request->validate($rules, $messages);

        $result = $kriteria_sub_kriteria->update($request->all());

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Relasi gagal diubah!');
        }

        return redirect('/kriteria_sub_kriteria');
    }

    public function destroy($id)
    {
        $kriteria_sub_kriteria = KriteriaSubKriteria::findOrFail($id);
        $result = $kriteria_sub_kriteria->delete();

        if ($result) {
            Session::flash('succMessage', 'Relasi berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Relasi gagal dihapus!');
        }

        return redirect('/kriteria_sub_kriteria');
    }
}