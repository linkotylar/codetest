<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return view('login');
})->name('login-form');

Route::get('/get_user', [DataTableController::class, 'getUser']);
Route::get('/get_menu', [DataTableController::class, 'getMenu']);
Route::get('/get_department', [DataTableController::class, 'getdepartment']);
Route::get('/get_role', [DataTableController::class, 'getRole']);
Route::get('/get_permission', [DataTableController::class, 'getPermission']);
Route::get('/check_permissions', [PermissionController::class, 'checkPermissions']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::middleware(['check.permission'])->group(function() {
        Route::get('/dashboards', function() {
            return view('dashboard');
        })->name('dashboard');
    
        Route::resource('users', UserController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
    
});
