<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'siswa_sub_kriteria';
    protected $guarded = ['id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}