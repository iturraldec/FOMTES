<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\AtencionCiudadano\Models\Persona;

class Visita extends Model
{
  use SoftDeletes;

  /**
   * The table associated with the model.
   */
  protected $table = 'AtencionCiudadano.visitas';

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = ['persona_id', 'fecha', 'sitio_id', 'observaciones'];
}
