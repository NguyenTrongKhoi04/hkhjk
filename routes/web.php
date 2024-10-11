<?php

use App\Http\Controllers\ConvertDataController;
use App\Http\Controllers\FileHandlingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    return view('layouts.main');
});
Route::post('/test', function (Request $request) {
    dd($request);
})->name('test');

Route::post('/downloadFile', [FileHandlingController::class, 'download'])->name('downloadFile');
Route::post('/convertXml', [ConvertDataController::class, 'convertXml'])->name('convert.xml');
Route::post('/convertCSV', [ConvertDataController::class, 'convertCSV'])->name('convert.csv');
Route::post('/convertYaml', [ConvertDataController::class, 'convertYaml'])->name('convert.yaml');

// Login Google
Route::get('/login', function () {
    return view('auth.login');
});
// Route để chuyển hướng đến Google
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});
// Route để xử lý callback từ Google
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // Tìm người dùng trong cơ sở dữ liệu hoặc tạo mới
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(str_random(16)), // Hoặc tạo một password ngẫu nhiên
        ]);
    }

    Auth::login($user, true); // Đăng nhập người dùng

    return redirect('/home'); // Chuyển hướng sau khi đăng nhập
});
