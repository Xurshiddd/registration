<?php

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
