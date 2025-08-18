<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\AtencionCiudadano\Models\Persona;

class Municipio extends Model
{

  public function persona()
  {
    return $this->hasMany(Persona::class, 'municipio_id')->where('id_estado', 13);
  }
}
