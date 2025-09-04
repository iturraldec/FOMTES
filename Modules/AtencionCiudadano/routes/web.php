<?php

use Illuminate\Support\Facades\Route;
use Modules\AtencionCiudadano\Http\Controllers\AtencionCiudadanoController;

Route::get('visitas/{reportType}/{desde}/{hasta}/print', [AtencionCiudadanoController::class, 'execute'])->name('visitas.print');
