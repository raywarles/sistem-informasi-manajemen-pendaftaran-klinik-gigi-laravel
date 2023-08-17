<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_obat','fungsi','dosis','aturan_pakai','tgl_kadaluarsa','harga'];
}
