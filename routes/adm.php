<?php

use App\Http\Controllers\Adm\AdmSettingsController;
use App\Http\Controllers\Adm\ContentTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\Adm\MenuController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\ProfileController;
use App\Http\Controllers\Adm\LanguageController;
use App\Http\Controllers\Adm\PermissionController;

Route::get('', function () {
    return view('adm.main');
})->name('adm');

Route::view('file-manager', 'adm.file-manager')->name('adm.file-manager');


Route::prefix('menu')->group(function () {
    Route::get('', [MenuController::class, 'index'])->name('adm.menu');
    Route::get('trashed', [MenuController::class, 'trashed'])->name('adm.menu-trashed')->middleware('can:can-edit-page');
    Route::get('create', [MenuController::class, 'create'])->name('adm.menu-create');
    Route::post('store', [MenuController::class, 'store'])->name('adm.menu-store');
    Route::post('update', [MenuController::class, 'update'])->name('adm.menu-update');
    Route::get('edit/{id}', [MenuController::class, 'edit'])->name('adm.menu-edit');
    Route::get('trash/{id}', [MenuController::class, 'trash'])->name('adm.menu-trash');
    Route::get('remove/{id}', [MenuController::class, 'remove'])->name('adm.menu-remove');
    Route::get('restore/{id}', [MenuController::class, 'restore'])->name('adm.menu-restore');
    Route::post('bulk-restore', [MenuController::class, 'bulkRestore'])->name('adm.menu-bulk-restore');
    Route::post('bulk-trash', [MenuController::class, 'bulkTrash'])->name('adm.menu-bulk-trash');
    Route::post('bulk-remove', [MenuController::class, 'bulkRemove'])->name('adm.menu-bulk-remove');
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

Route::prefix('role')->group(function () {
    Route::get('', [RoleController::class, 'index'])->name('adm.role');
    Route::get('trashed', [RoleController::class, 'trashed'])->name('adm.role-trashed');
    Route::get('create', [RoleController::class, 'create'])->name('adm.role-create');
    Route::post('store', [RoleController::class, 'store'])->name('adm.role-store');
    Route::post('update', [RoleController::class, 'update'])->name('adm.role-update');
    Route::get('edit/{id}', [RoleController::class, 'edit'])->name('adm.role-edit');
    Route::get('trash/{id}', [RoleController::class, 'trash'])->name('adm.role-trash');
    Route::get('remove/{id}', [RoleController::class, 'remove'])->name('adm.role-remove');
    Route::get('restore/{id}', [RoleController::class, 'restore'])->name('adm.role-restore');
    Route::post('bulk-restore', [RoleController::class, 'bulkRestore'])->name('adm.role-bulk-restore');
    Route::post('bulk-trash', [RoleController::class, 'bulkTrash'])->name('adm.role-bulk-trash');
    Route::post('bulk-remove', [RoleController::class, 'bulkRemove'])->name('adm.role-bulk-remove');
});

Route::prefix('permission')->group(function () {
    Route::get('', [PermissionController::class, 'index'])->name('adm.permission');
    Route::get('trashed', [PermissionController::class, 'trashed'])->name('adm.permission-trashed');
    Route::get('create', [PermissionController::class, 'create'])->name('adm.permission-create');
    Route::post('store', [PermissionController::class, 'store'])->name('adm.permission-store');
    Route::post('update', [PermissionController::class, 'update'])->name('adm.permission-update');
    Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('adm.permission-edit');
    Route::get('trash/{id}', [PermissionController::class, 'trash'])->name('adm.permission-trash');
    Route::get('remove/{id}', [PermissionController::class, 'remove'])->name('adm.permission-remove');
    Route::get('restore/{id}', [PermissionController::class, 'restore'])->name('adm.permission-restore');
    Route::post('bulk-restore', [PermissionController::class, 'bulkRestore'])->name('adm.permission-bulk-restore');
    Route::post('bulk-trash', [PermissionController::class, 'bulkTrash'])->name('adm.permission-bulk-trash');
    Route::post('bulk-remove', [PermissionController::class, 'bulkRemove'])->name('adm.permission-bulk-remove');
});

Route::prefix('profile')->group(function () {
    Route::get('{id}', [ProfileController::class, 'index'])->name('adm.profile');
    Route::get('{id}/edit', [ProfileController::class, 'edit'])->name('adm.profile-edit');
    Route::post('create', [ProfileController::class, 'create'])->name('adm.profile-create');
    Route::post('update', [ProfileController::class, 'update'])->name('adm.profile-update');
    Route::post('remove', [ProfileController::class, 'remove'])->name('adm.profile-remove');
});

Route::prefix('settings')->group(function () {
    Route::get('', [AdmSettingsController::class, 'index'])->name('adm.settings');
    Route::post('update', [AdmSettingsController::class, 'update'])->name('adm.settings-update');
});

Route::prefix('content-type')->group(function () {
    Route::get('', [ContentTypeController::class, 'index'])->name('adm.content-type');
    Route::get('trashed', [ContentTypeController::class, 'trashed'])->name('adm.content-type-trashed');
    Route::get('create', [ContentTypeController::class, 'create'])->name('adm.content-type-create');
    Route::post('store', [ContentTypeController::class, 'store'])->name('adm.content-type-store');
    Route::post('update', [ContentTypeController::class, 'update'])->name('adm.content-type-update');
    Route::get('edit/{id}', [ContentTypeController::class, 'edit'])->name('adm.content-type-edit');
    Route::get('trash/{id}', [ContentTypeController::class, 'trash'])->name('adm.content-type-trash');
    Route::get('remove/{id}', [ContentTypeController::class, 'remove'])->name('adm.content-type-remove');
    Route::get('restore/{id}', [ContentTypeController::class, 'restore'])->name('adm.content-type-restore');
    Route::post('bulk-restore', [ContentTypeController::class, 'bulkRestore'])->name('adm.content-type-bulk-restore');
    Route::post('bulk-trash', [ContentTypeController::class, 'bulkTrash'])->name('adm.content-type-bulk-trash');
    Route::post('bulk-remove', [ContentTypeController::class, 'bulkRemove'])->name('adm.content-type-bulk-remove');
});