<?php

use App\Http\Controllers\Adm\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('adm.main');
})->name('adm');


Route::prefix('menu')->group(function () {
    Route::get('', [MenuController::class, 'index'])->name('adm.menu');
    Route::get('trashed', [MenuController::class, 'trashed'])->name('adm.menu-trashed');
    Route::get('create', [MenuController::class, 'create'])->name('adm.menu-create');
    Route::post('store', [MenuController::class, 'store'])->name('adm.menu-store');
    Route::get('edit/{id}', [MenuController::class, 'edit'])->name('adm.menu-edit');
    Route::post('update', [MenuController::class, 'update'])->name('adm.menu-update');
    Route::get('remove/{id}', [MenuController::class, 'remove'])->name('adm.menu-remove');
});