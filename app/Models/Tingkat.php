<?php

namespace App\Models;

use App\Models\TingkatKelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = 'tingkat';
    protected $guarded = ['id'];

    public function tingkat_kelas()
    {
        return $this->hasMany(TingkatKelas::class, 'tingkat_id', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'tingkat_id', 'id');
    }
}