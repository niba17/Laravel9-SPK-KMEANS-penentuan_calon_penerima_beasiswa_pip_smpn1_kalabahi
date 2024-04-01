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
use App\Models\Perhitungan;
use App\Models\Cluster1;
use App\Models\Cluster2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;

class PerhitunganController extends Controller
{
    protected $perhitungan;
    public function __construct()
    {
        $this->perhitungan = new Perhitungan();
    }

    public function validator(Type $var = null)
    {
        $validator = $this->perhitungan->validator();
        if ($validator[0] == false) {

            $akun = User::get();
            $siswa = Siswa::get();
            $kriteria = Kriteria::get();
            $kecamatan = Kecamatan::get();
            $kelurahan = Kelurahan::get();
            $tingkat = Tingkat::get();
            $kelas = Kelas::get();

            session()->forget(['succKMEANSMessage']);
            Session::flash('errKMEANSMessage', $validator[1]);

            return view('home', ['akun' => $akun, 'siswa' => $siswa, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan, 'kriteria' => $kriteria, 'tingkat' => $tingkat, 'kelas' => $kelas]);
        } elseif ($validator[0] == true) {

            Cluster1::truncate();
            Cluster2::truncate();

            $kmeans = $this->perhitungan->kmeans();

            $siswa = Siswa::with(['siswa_kriteria.kriteria'])->get();

            $kriteria = Kriteria::get();

            session()->forget(['errKMEANSMessage']);
            Session::flash('succKMEANSMessage', 'Berhasil menghitung ' . count($siswa) . ' siswa!');

            return view('perhitungan.perhitungan-hasil', ['siswa' => $siswa, 'kriteria' => $kriteria, 'kmeans' => $kmeans]);
        }

    }
    public function cetak()
    {
        $cluster1 = Cluster1::get();
        $cluster2 = Cluster2::get();

        $siswa = Siswa::get();
        $kmeans = $this->perhitungan->kmeans($cluster1->all(), $cluster2->all());

        session()->forget(['errKMEANSMessage', 'succKMEANSMessage']);

        return view('cetak.cetak_perhitungan-hasil', ['kmeans' => $kmeans, 'siswa' => $siswa]);
    }
}