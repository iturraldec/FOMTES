<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Municipio;

class Persona extends Model
{
  use SoftDeletes;

  /**
   * The table associated with the model.
   */
  protected $table = 'AtencionCiudadano.personas';

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = ['documento_id', 'nombres', 'apellidos', 'email', 'municipio_id', 'parroquia_id', 'direccion', 'observaciones'];

  //
  public function municipio()
  {
    return $this->belongsTo(Municipio::class, 'municipio_id', 'id_municipio');
  }
}
