<?php

use App\Http\Controllers\FileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('file/create',[FileController::class, 'create'])->name('file.create');
Route::post('file',[FileController::class, 'new'])->name('file.new');
Route::get('files',[FileController::class, 'index'])->name('files');
Route::get('file/{file}',[FileController::class, 'show'])->name('file.show');
Route::get('file/delete/{file}',[FileController::class, 'delete'])->name('file.delete');
