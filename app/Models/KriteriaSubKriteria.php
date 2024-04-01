<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria_sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }
}