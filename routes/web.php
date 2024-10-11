<?php

use App\Http\Controllers\ConvertDataController;
use App\Http\Controllers\FileHandlingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    // return view('welcome');
    return view('users.index');
});
Route::post('/test', function (Request $request) {
    dd($request);
})->name('test');

Route::post('/downloadFile', [FileHandlingController::class, 'download'])->name('downloadFile');
Route::post('/convertXml', [ConvertDataController::class, 'convertXml'])->name('convert.xml');
Route::post('/convertCSV', [ConvertDataController::class, 'convertCSV'])->name('convert.csv');
Route::post('/convertYaml', [ConvertDataController::class, 'convertYaml'])->name('convert.yaml');

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
// Route::post('/login', [UserController::class, 'requestLogin'])->name('requestLogin');