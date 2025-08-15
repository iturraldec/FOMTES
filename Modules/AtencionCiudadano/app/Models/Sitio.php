<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'AtencionCiudadano.sitios';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre', 'activo'];
}