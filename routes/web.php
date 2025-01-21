<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupPermissionsController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groups', GroupController::class);
Route::resource('permissions', PermissionController::class);

Route::post('/groups/{group}/assign-permissions', [GroupPermissionsController::class, 'assignPermissions'])->name('groups.assign-permissions');
Route::post('/groups/{group}/remove-permissions', [GroupPermissionsController::class, 'removePermissions'])->name('groups.remove-permissions');
