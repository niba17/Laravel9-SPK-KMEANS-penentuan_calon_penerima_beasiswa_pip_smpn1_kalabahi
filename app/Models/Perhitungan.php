<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\SiswaKriteria;
use App\Models\Cluster1;
use App\Models\Cluster2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perhitungan extends Model
{
    use HasFactory;

    public function validator()
    {
        $siswa_get = Siswa::with(['siswa_kriteria'])->get();
        $kriteria_get = Kriteria::get();
        $kecamatan_get = Kecamatan::get();
        $kelurahan_get = Kelurahan::get();
        $tingkat_get = Tingkat::get();
        $kelas_get = Kelas::get();

        $pesan = '';
        $valid = true;

        if (count($siswa_get) < 1) {
            $valid = false;
            $pesan = 'Siswa tidak ada!';
        }

        if (count($kriteria_get) < 1) {
            $valid = false;
            $pesan = 'Kriteria tidak ada!';
        }

        if (count($kecamatan_get) < 1) {
            $valid = false;
            $pesan = 'Kecamatan tidak ada!';
        }

        if (count($kelurahan_get) < 1) {
            $valid = false;
            $pesan = 'Kelurahan tidak ada!';
        }

        if (count($tingkat_get) < 1) {
            $valid = false;
            $pesan = 'Tingkat tidak ada!';
        }

        if (count($kelas_get) < 1) {
            $valid = false;
            $pesan = 'Kelas tidak ada!';
        }

        $siswa = [];
        $i = 0;
        foreach ($siswa_get as $key_siswa_get => $value_siswa_get) {

            if (!isset($value_siswa_get->siswa_kriteria) || count($value_siswa_get->siswa_kriteria) !== count($kriteria_get)) {

                $valid = false;
                $siswa = $value_siswa_get->nama;
                $pesan = 'Lengkapi Kriteria siswa An. ' . $value_siswa_get->nama . ' terlebih dahulu!';
                break;

            }

            $i++;
        }

        $return = [$valid, $pesan];

        return $return;
    }

    public function kmeans($cluster1 = null, $cluster2 = null)
    {
        $siswa_get = Siswa::with(['siswa_kriteria.kriteria'])->get();
        $kriteria_get = Kriteria::get();
        $siswa_kriteria_get = SiswaKriteria::get();

        //iterasi
        $siswa = $siswa_get->all();
        $jarakC1 = [];
        $jarakC2 = [];
        $hasil = [];
        $i = 0;
        $cluster1 = [0 => 92, 1 => 93.5, 2 => 400000, 3 => 4];
        $cluster2 = [0 => 82.5, 1 => 85.2, 2 => 1750000, 3 => 1];
        $cluster1Random = [];
        $cluster2Random = [];

        //mengambil nilai cluster random
        // $temp_rand = [];
        // foreach ($siswa_get as $key_siswa_get => $value_siswa_get) {

        //     foreach ($value_siswa_get->siswa_kriteria as $key_siswa_kriteria => $value_siswa_kriteria) {

        //         $temp_rand[$key_siswa_get][$key_siswa_kriteria] = $value_siswa_kriteria->bobot;

        //     }

        // }

        // // dd($temp_rand);

        // if ($cluster1 == null && $cluster2 == null) {

        //     foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

        //         $randomIndex = array_rand($temp_rand[0]);
        //         $randomValue = $temp_rand[0][$randomIndex];

        //         $cluster1Random[$key_kriteria_get] = $randomValue;

        //     }

        //     foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

        //         $randomIndex = array_rand($temp_rand[0]);
        //         $randomValue = $temp_rand[0][$randomIndex];

        //         $cluster2Random[$key_kriteria_get] = $randomValue;

        //     }

        //     foreach ($cluster1Random as $key_cluster1Random => $value_cluster1Random) {

        //         Cluster1::create(['value' => $value_cluster1Random]);

        //     }

        //     foreach ($cluster2Random as $key_cluster2Random => $value_cluster2Random) {

        //         Cluster2::create(['value' => $value_cluster2Random]);

        //     }

        // } elseif ($cluster1 !== null && $cluster2 !== null) {

        //     foreach ($cluster1 as $key_cluster1 => $value_cluster1) {

        //         $cluster1Random[$key_cluster1] = $value_cluster1->value;

        //     }

        //     foreach ($cluster2 as $key_cluster2 => $value_cluster2) {

        //         $cluster2Random[$key_cluster2] = $value_cluster2->value;

        //     }

        // }

        // dd($cluster2Random);

        do {

            $kondisi_berhenti = false;
            $iC1 = 0;
            $iC2 = 0;

            if ($i > 0) {

                foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                    $jarakC1[$key_siswa] = 0;
                    $jarakC2[$key_siswa] = 0;
                    $temp1 = 0;
                    $temp2 = 0;
                    foreach ($siswa as $key_siswa => $value_siswa) {

                        foreach ($value_siswa->siswa_kriteria as $key_siswa_kriteria => $value_siswa_kriteria) {

                            if ($value_kriteria_get->id == $value_siswa_kriteria->kriteria_id) {

                                if ($hasil[$i - 1][$key_siswa]['C1'] == true) {

                                    $temp1 = $temp1 + $value_siswa_kriteria->bobot;

                                } elseif ($hasil[$i - 1][$key_siswa]['C2'] == true) {

                                    $temp2 = $temp2 + $value_siswa_kriteria->bobot;

                                }

                            }

                        }

                    }

                    if ($hasil[$i - 1]['total_C1'] == 0) {
                        $hasil[$i - 1]['total_C1'] = 1;
                    }
                    if ($hasil[$i - 1]['total_C2'] == 0) {
                        $hasil[$i - 1]['total_C2'] = 1;
                    }

                    $cluster1[$key_kriteria_get] = $temp1 / $hasil[$i - 1]['total_C1'];
                    $cluster2[$key_kriteria_get] = $temp2 / $hasil[$i - 1]['total_C2'];

                }

            }


            foreach ($siswa as $key_siswa => $value_siswa) {

                $jarakC1[$key_siswa] = 0;
                $jarakC2[$key_siswa] = 0;

                foreach ($value_siswa->siswa_kriteria as $key_siswa_kriteria => $value_siswa_kriteria) {

                    foreach ($kriteria_get as $key_kriteria_get => $value_kriteria_get) {

                        if ($value_siswa_kriteria->kriteria_id == $value_kriteria_get->id) {

                            $jarakC1[$key_siswa] = $jarakC1[$key_siswa] + ($cluster1[$key_kriteria_get] - $value_siswa_kriteria->bobot) ** 2;
                            $jarakC2[$key_siswa] = $jarakC2[$key_siswa] + ($cluster2[$key_kriteria_get] - $value_siswa_kriteria->bobot) ** 2;

                        }

                    }

                }

                $jarakC1[$key_siswa] = sqrt($jarakC1[$key_siswa]);
                $jarakC2[$key_siswa] = sqrt($jarakC2[$key_siswa]);

                $hasil[$i][$key_siswa]['siswa_nama'] = $value_siswa->nama;
                $hasil[$i][$key_siswa]['siswa_nis'] = $value_siswa->nis;

                if ($jarakC1[$key_siswa] < $jarakC2[$key_siswa]) {

                    $hasil[$i][$key_siswa]['C1'] = true;
                    $hasil[$i][$key_siswa]['C2'] = false;
                    $iC1++;

                } else {

                    $hasil[$i][$key_siswa]['C1'] = false;
                    $hasil[$i][$key_siswa]['C2'] = true;
                    $iC2++;

                }

            }

            $hasil[$i]['total_C1'] = $iC1;
            $hasil[$i]['total_C2'] = $iC2;

            if ($i > 1) {
                if ($hasil[$i]['total_C1'] == $hasil[$i - 1]['total_C1'] && $hasil[$i]['total_C2'] == $hasil[$i - 1]['total_C2']) {
                    $kondisi_berhenti = true;
                }
            }

            $i++;

        } while ($kondisi_berhenti == false);

        // dd($hasil);

        return $hasil;
    }

    function bubble_sort($arr)
    {
        $x = 0;
        foreach ($arr as $item => $value) {
            $size = count($arr[$x]['sub_kriteria']) - 1;
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size - $i; $j++) {
                    $k = $j + 1;
                    if ($arr[$x]['sub_kriteria'][$k]['bobot'] > $arr[$x]['sub_kriteria'][$j]['bobot']) {
                        // Swap elements at indices: $j, $k
                        list($arr[$x]['sub_kriteria'][$j], $arr[$x]['sub_kriteria'][$k]) = array($arr[$x]['sub_kriteria'][$k], $arr[$x]['sub_kriteria'][$j]);
                    }
                }
            }
            $x++;
        }

        $result = [];
        $i = 0;
        foreach ($arr as $key => $value) {
            $result[$i]['kriteria']['kriteria_id'] = $value['kriteria_id'];
            $result[$i]['kriteria']['nama'] = $value['kriteria'];
            // $result[$i]['kriteria']['bobot'] = $value['bobot'];

            $result[$i]['kriteria']['sub_kriteria']['max'] = reset($value['sub_kriteria']);
            $result[$i]['kriteria']['sub_kriteria']['min'] = end($value['sub_kriteria']);
            $i++;
        }
        // dd($result);

        return [$result];
    }
    function bubble_sort_final($arr, $key)
    {

        $size = count($arr) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($arr[$k][$key] > $arr[$j][$key]) {
                    // Swap elements at indices: $j, $k
                    list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
                }
            }
        }

        return [$arr];
    }
}