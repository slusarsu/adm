<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('adm.main');
})->name('adm');
