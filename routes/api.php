<?php

use App\Http\Controllers\CipherController;
use Illuminate\Support\Facades\Route;

Route::post('/cipher', CipherController::class);
