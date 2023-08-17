<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekam extends Model
{
    use HasFactory;
    protected $fillable = ['pasien_id','nama_pasien','keluhan','tgl_rekam','status'];
}
