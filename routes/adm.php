<?php

use App\Http\Controllers\Adm\LanguageController;
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

Route::prefix('language')->group(function () {
    Route::get('', [LanguageController::class, 'index'])->name('adm.language');
    Route::get('trashed', [LanguageController::class, 'trashed'])->name('adm.language-trashed');
    Route::get('create', [LanguageController::class, 'create'])->name('adm.language-create');
    Route::post('store', [LanguageController::class, 'store'])->name('adm.language-store');
    Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('adm.language-edit');
    Route::post('update', [LanguageController::class, 'update'])->name('adm.language-update');
    Route::get('remove/{id}', [LanguageController::class, 'remove'])->name('adm.language-remove');
});