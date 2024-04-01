<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cluster1 extends Model
{
    use HasFactory;
    protected $table = 'cluster1';
    protected $guarded = ['id'];

}