<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ProspectController;
use App\Http\Controllers\Admin\RelanceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/domaines', [App\Http\Controllers\Admin\DomaineController::class, 'index'])->name('admin.domaines.index');
    Route::post('/admin/domaines/create', [App\Http\Controllers\Admin\DomaineController::class, 'store'])->name('admin.domaines.store');
    Route::get('/admin/domaines/delete/{id}', [App\Http\Controllers\Admin\DomaineController::class, 'destroy'])->name('admin.domaines.destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin/prospects')->group(function () {
        Route::get('', [ProspectController::class, 'index'])->name('admin.prospects.index');
        Route::post('/create', [ProspectController::class, 'store'])->name('admin.prospects.store');
        Route::get('/create', [ProspectController::class, 'create'])->name('admin.prospects.create');
        Route::get('/edit/{id}', [ProspectController::class, 'edit'])->name('admin.prospects.edit');
        Route::get('/show/{id}', [ProspectController::class, 'show'])->name('admin.prospects.show');
        Route::post('/update/{id}', [ProspectController::class, 'update'])->name('admin.prospects.update');
        Route::get('/trash', [ProspectController::class, 'getDeleteProspects'])->name('admin.prospects.trash');
        Route::get('/restore/{id}', [ProspectController::class, 'restoreDeleteProspects'])->name('admin.prospects.restore');
        Route::get('/delete/{id}', [ProspectController::class, 'destroy'])->name('admin.prospects.destroy');
        Route::get('/deleteforce/{id}', [ProspectController::class, 'deletePermanentlyProspect'])->name('admin.prospects.deleteforce');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin/relances')->group(function () {
        Route::get('', [RelanceController::class, 'index'])->name('admin.relances.index');
        Route::post('/create', [RelanceController::class, 'store'])->name('admin.relances.store');
        Route::get('/create', [RelanceController::class, 'create'])->name('admin.relances.create');
        Route::get('/edit/{id}', [RelanceController::class, 'edit'])->name('admin.relances.edit');
        Route::post('/update/{id}', [RelanceController::class, 'update'])->name('admin.relances.update');
        Route::get('/delete/{id}', [RelanceController::class, 'destroy'])->name('admin.relances.destroy');
    });
});
