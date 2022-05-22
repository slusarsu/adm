<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adm\MenuController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\LanguageController;

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
    Route::post('update', [LanguageController::class, 'update'])->name('adm.language-update');
    Route::get('edit/{id}', [LanguageController::class, 'edit'])->name('adm.language-edit');
    Route::get('trash/{id}', [LanguageController::class, 'trash'])->name('adm.language-trash');
    Route::get('remove/{id}', [LanguageController::class, 'remove'])->name('adm.language-remove');
    Route::get('restore/{id}', [LanguageController::class, 'restore'])->name('adm.language-restore');
    Route::post('bulk-restore', [LanguageController::class, 'bulkRestore'])->name('adm.language-bulk-restore');
    Route::post('bulk-trash', [LanguageController::class, 'bulkTrash'])->name('adm.language-bulk-trash');
    Route::post('bulk-remove', [LanguageController::class, 'bulkRemove'])->name('adm.language-bulk-remove');
});

Route::prefix('user')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('adm.user');
    Route::get('trashed', [UserController::class, 'trashed'])->name('adm.user-trashed');
    Route::get('create', [UserController::class, 'create'])->name('adm.user-create');
    Route::post('store', [UserController::class, 'store'])->name('adm.user-store');
    Route::post('update', [UserController::class, 'update'])->name('adm.user-update');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('adm.user-edit');
    Route::get('trash/{id}', [UserController::class, 'trash'])->name('adm.user-trash');
    Route::get('remove/{id}', [UserController::class, 'remove'])->name('adm.user-remove');
    Route::get('restore/{id}', [UserController::class, 'restore'])->name('adm.user-restore');
    Route::post('bulk-restore', [UserController::class, 'bulkRestore'])->name('adm.user-bulk-restore');
    Route::post('bulk-trash', [UserController::class, 'bulkTrash'])->name('adm.user-bulk-trash');
    Route::post('bulk-remove', [UserController::class, 'bulkRemove'])->name('adm.user-bulk-remove');
});