<?php

use App\Http\Controllers\HomebudgetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homebudget.index');
});

Route::get('/', [HomebudgetController::class,'index'])->name('index');
