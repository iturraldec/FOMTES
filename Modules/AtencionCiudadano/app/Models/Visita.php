<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\AtencionCiudadano\Models\Persona;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
  protected $fillable = ['persona_id', 'sitio_id', 'observaciones', 'created_at'];

  //
  protected function createdAt(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => date('d/m/Y H:i', strtotime($value)),
    );
  }

  //
  public function persona()
  {
    return $this->belongsTo(Persona::class);
  }

  //
  public function sitio()
  {
    return $this->belongsTo(Sitio::class, 'sitio_id', 'id');
  }
}
