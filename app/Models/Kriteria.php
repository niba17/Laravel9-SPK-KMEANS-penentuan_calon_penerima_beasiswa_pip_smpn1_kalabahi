<?php

namespace App\Models;

use App\Models\SiswaKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = ['id'];

    public function siswa_kriteria()
    {
        return $this->hasMany(SiswaSubKriteria::class, 'kriteria_id', 'id');
    }
}