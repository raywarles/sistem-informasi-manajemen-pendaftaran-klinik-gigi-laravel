<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['rekam_id','obat_id','layanan_id','diagnosa','resep','total_biaya'];

     public function setObatAttribute($value)

    {

        $this->attributes['obat_id'] = json_encode($value);

    }


    public function getObatAttribute($value)

    {

        return $this->attributes['obat_id'] = json_decode($value);

    }
     public function setLayananAttribute($value)

    {

        $this->attributes['layanan_id'] = json_encode($value);

    }


    public function getLayananAttribute($value)

    {

        return $this->attributes['layanan_id'] = json_decode($value);

    }

}
