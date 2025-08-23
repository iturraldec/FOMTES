<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Parroquia;

class Municipio extends Model
{

  public function parroquias()
  {
    return $this->hasMany(Parroquia::class, 'id_municipio', 'id_municipio');
  }
}
