<?php

namespace App\Http\Controllers;

use App\Models\User;
use PHPUnit\Util\Type;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Siswa;

class HomeController extends Controller
{
    public function index(Type $var = null)
    {
        $akun = User::get();
        $siswa = Siswa::get();
        $kriteria = Kriteria::get();
        $kecamatan = Kecamatan::get();
        $kelurahan = Kelurahan::get();
        $tingkat = Tingkat::get();
        $kelas = Kelas::get();

        session()->forget(['succKMEANSMessage']);

        return view('home', ['akun' => $akun, 'siswa' => $siswa, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'kriteria' => $kriteria, 'tingkat' => $tingkat, 'kelas' => $kelas]);
    }
}