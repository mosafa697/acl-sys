<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupPermissionsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'destroy']);
Route::resource('groups', GroupController::class);
Route::post('/groups/{group}/assign-permissions', [GroupPermissionsController::class, 'assignPermissions'])->name('groups.assign-permissions');
Route::resource('permissions', PermissionController::class);
Route::get('/users/{user}/permissions/edit', [UserPermissionController::class, 'edit'])->name('user-permissions.edit');
Route::put('/users/{user}/permissions', [UserPermissionController::class, 'update'])->name('user-permissions.update');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
