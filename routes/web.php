<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=> 'auth', 'prefix'=>'admin'], static function (){
    Route::get('/',  [DashboardController::class, 'index'])->name('admin');
    Route::resource('category', CategoryController::class);
});

require __DIR__.'/auth.php';
