<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use Modules\AtencionCiudadano\Models\Persona;

class Parroquia extends Model
{

  public function municipio()
  {
    return $this->belongsTo(Municipio::class, 'id_municipio', 'id_municipio');
  }

  public function personas()
  {
    return $this->hasMany(Persona::class, 'parroquia_id', 'id_parroquia');
  }
}
