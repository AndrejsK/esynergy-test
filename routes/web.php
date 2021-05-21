<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ProductController;
use App\Http\Resources\AuditResource;
use Illuminate\Support\Facades\Route;
use OwenIt\Auditing\Models\Audit;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products', ProductController::class);

/// Audit information API
Route::get('audit', [AuditController::class, 'dump']);
Route::get('audit/{from}/{till}', [AuditController::class, 'dump']);

require __DIR__.'/auth.php';
