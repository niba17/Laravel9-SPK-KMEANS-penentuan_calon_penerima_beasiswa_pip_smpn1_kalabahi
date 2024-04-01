<?php

namespace App\Models;

use App\Models\Tingkat;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKelas extends Model
{
    use HasFactory;

    protected $table = 'tingkat_kelas';
    protected $guarded = ['id'];

    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}