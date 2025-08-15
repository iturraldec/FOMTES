<?php

use Illuminate\Support\Facades\Route;
use Modules\AtencionCiudadano\Http\Controllers\AtencionCiudadanoController;

Route::resource('atencion-ciudadanos', AtencionCiudadanoController::class)->names('atencion_ciudadano');
