<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Parroquia;

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
  protected $fillable = ['documento_id', 'nombres', 'apellidos', 'email', 'parroquia_id', 'direccion', 'observaciones'];

  //
  public function parroquia()
  {
    return $this->belongsTo(Parroquia::class, 'parroquia_id', 'id_parroquia');
  }

  //
  public function visitas()
  {
    return $this->hasMany(Visita::class);
  }
}
