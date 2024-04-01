<?php

namespace App\Models;

use App\Models\TingkatKelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function tingkat_kelas()
    {
        return $this->hasMany(TingkatKelas::class, 'kelas_id', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'tingkat_id', 'id');
    }
}