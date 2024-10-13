<?php

use App\Http\Controllers\ConvertDataController;
use App\Http\Controllers\FileHandlingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FormatController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

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

Route::middleware('auth')->group(function () {
    Route::post('/save-format', [FormatController::class, 'save'])->name('save.format');

    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/logout', 'UserLogout')->name('user.logout');
        Route::get('/change/password', 'UserChangePassword')->name('user.change.password');
    });
    Route::prefix('saveformat')->controller(UserController::class)->group(function () {
        Route::get('/getCreate', 'create')->name('create.save.format');
        Route::get('/getSave', 'index')->name('get.save');
    });
});

require __DIR__ . '/auth.php';
