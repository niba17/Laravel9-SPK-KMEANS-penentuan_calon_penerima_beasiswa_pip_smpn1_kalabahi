<?php

namespace App\Http\Controllers;

use PHPUnit\Util\Type;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Kecamatan;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Kelurahan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    // public function index(Type $var = null)
    // {
    //     $siswa = Siswa::get();

    //     return view('siswa', ['siswa' => $siswa]);
    // }

    public function create()
    {
        $tingkat = Tingkat::get();
        $kelas = Kelas::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();

        return view('add.siswa-add', ['kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [];
        $messages = [];

        $rules['nama'] = 'unique:siswa|max:50|required';
        $messages['nama.unique'] = 'Nama siswa sudah ada!';
        $messages['nama.max'] = 'Nama siswa tidak boleh lebih dari :max karakter!';
        $messages['nama.required'] = 'Nama siswa wajib diisi!';

        $rules['nis'] = 'unique:siswa|max:50|required';
        $messages['nis.unique'] = 'NIS sudah ada!';
        $messages['nis.max'] = 'NIS tidak boleh lebih dari :max karakter!';
        $messages['nis.required'] = 'NIS wajib diisi!';

        $rules['jk'] = 'required';
        $messages['jk.required'] = 'Jenis Kelamin dipilih!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal lahir wajib diisi!';

        $rules['tingkat_id'] = 'required';
        $messages['tingkat_id.required'] = 'Tingkat wajib dipilih!';

        $rules['kelas_id'] = 'required';
        $messages['kelas_id.required'] = 'Kelas wajib dipilih!';

        $rules['kecamatan_id'] = 'required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        $rules['kelurahan_id'] = 'required';
        $messages['kelurahan_id.required'] = 'Kelurahan wajib dipilih!';

        $request->validate($rules, $messages);

        $arrayAdd = [];
        $arrayAdd = $request;

        $kasus = Siswa::create($arrayAdd->all());

        if ($kasus) {
            Session::flash('succMessage', 'Siswa berhasil ditambahkan!');
        } else {
            Session::flash('errMessage', 'Siswa gagal ditambahkan!');
        }

        return redirect('/siswa_kriteria');
    }

    public function edit($id)
    {
        // dd($id);
        $siswa = Siswa::findOrFail($id);
        $tingkat = Tingkat::with(['tingkat_kelas.kelas'])->get();
        $kelas = Kelas::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();
        $jk = ['Laki - Laki', 'Perempuan'];

        // dd($tingkat);

        return view('edit.siswa-edit', ['siswa' => $siswa, 'kecamatan' => $kecamatan, 'jk' => $jk, 'kelurahan' => $kelurahan, 'tingkat' => $tingkat, 'kelas' => $kelas]);
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        $messages = [];

        $siswa = Siswa::findOrFail($id);

        if ($request->nama != $siswa->nama) {
            $rules['nama'] = 'unique:siswa|max:50|required';
            $messages['nama.unique'] = 'Nama Siswa Sudah ada!';
            $messages['nama.required'] = 'Siswa wajib Diisi!';
            $messages['nama.max'] = 'Nama Siswa tidak boleh lebih dari :max karakter!';
        }

        if ($request->nis != $siswa->nis) {
            $rules['nis'] = 'unique:siswa|required';
            $messages['nis.unique'] = 'NIS Sudah ada!';
            $messages['nis.required'] = 'NIS wajib Diisi!';
        }

        $rules['jk'] = 'required';
        $messages['jk.required'] = 'Jenis kelamin wajib diisi!';

        $rules['tgl_lahir'] = 'required';
        $messages['tgl_lahir.required'] = 'Tanggal wajib diisi!';

        $rules['tingkat_id'] = 'required';
        $messages['tingkat_id.required'] = 'Jurusan wajib dipilih!';

        $rules['kelas_id'] = 'required';
        $messages['kelas_id.required'] = 'Jurusan wajib dipilih!';

        $rules['kecamatan_id'] = 'required';
        $messages['kecamatan_id.required'] = 'Kecamatan wajib dipilih!';

        $rules['kelurahan_id'] = 'required';
        $messages['kelurahan_id.required'] = 'Kelurahan wajib diisi!';


        $request->validate($rules, $messages);

        $result = $siswa->update($request->all());


        if ($result) {
            Session::flash('succMessage', 'Siswa berhasil diubah!');
        } else {
            Session::flash('errMessage', 'Siswa gagal diubah!');
        }

        return redirect('/siswa_kriteria');
    }

    public function destroy($id)
    {
        $kecamatan = Siswa::findOrFail($id);
        $result = $kecamatan->delete();

        if ($result) {
            Session::flash('succMessage', 'Siswa berhasil dihapus!');
        } else {
            Session::flash('errMessage', 'Siswa gagal dihapus!');
        }

        return redirect('/siswa_kriteria');
    }

    public function request()
    {
        $siswa = Siswa::with(['siswa_kriteria.kriteria'])->get();
        $kriteria = Kriteria::get();

        return response()->json([$siswa, $kriteria]);
    }
}