<?php

use Illuminate\Support\Facades\Route;
use Modules\AtencionCiudadano\Http\Controllers\AtencionCiudadanoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('atencionciudadanos', AtencionCiudadanoController::class)->names('atencionciudadano');
});
