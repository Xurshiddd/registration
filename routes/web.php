<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ru', 'uz'])) abort(400);
    Session::put('locale', $locale);
    app()->setLocale($locale);
    return redirect()->back();
})->name('lang.switch');
Route::post('registration', [RegistrationController::class, 'store'])->name('save');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('registry', [RegistrationController::class, 'index'])->middleware('auth')->name('admin.index');
Route::get('registry/{id}', [RegistrationController::class, 'show'])->middleware('auth')->name('admin.show');
