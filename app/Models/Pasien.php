<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = ['nama','username','password','jk','alamat','nope','status','level','tgl_lahir'];
    
}
