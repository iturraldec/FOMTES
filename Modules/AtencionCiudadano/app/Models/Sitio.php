<?php

namespace Modules\AtencionCiudadano\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sitio extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     */
    protected $table = 'AtencionCiudadano.sitios';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nombre', 'activo'];

    //
    protected function activo(): Attribute
    {
        return Attribute::make(
            get: fn (bool $value) => ($value) ? 'Sí' : 'No',
        );
    }
}