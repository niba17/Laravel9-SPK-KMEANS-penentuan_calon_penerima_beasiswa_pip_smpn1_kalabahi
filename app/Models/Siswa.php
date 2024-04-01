<?php

namespace App\Models;

use App\Models\Tingkat;
use App\Models\Kelas;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\SiswaKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function siswa_kriteria()
    {
        return $this->hasMany(SiswaKriteria::class, 'siswa_id', 'id');
    }
}