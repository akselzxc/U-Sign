<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Frontend/Home', [
//        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

//Route::get('dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Navigaton Bar
Route::get('/home', [App\Http\Controllers\NavbarController::class, 'home'])->name('home');
Route::get('/tutorial', [App\Http\Controllers\NavbarController::class, 'tutorial'])->name('tutorial');
Route::get('/faqs', [App\Http\Controllers\NavbarController::class, 'faqs'])->name('faqs');
Route::get('/user', [App\Http\Controllers\NavbarController::class, 'user'])->name('user');

//UserOption Routes
Route::get('/studentInput', [App\Http\Controllers\NavbarController::class, 'studentInput'])->name('studentInput');
Route::get('/guestInput', [App\Http\Controllers\NavbarController::class, 'guestInput'])->name('guestInput');

//Queries Routes
Route::get('/queries', [App\Http\Controllers\NavbarController::class, 'queries'])->name('queries');
Route::get('/deafUI', [App\Http\Controllers\NavbarController::class, 'deafUI'])->name('deafUI');



//Route::get('/tutorial', function () {
//    return Inertia::render('Frontend/Tutorial');
//})->name('tutorial');
//
//Route::get('/faqs', function () {
//    return Inertia::render('Frontend/Faqs');
//})->name('faqs');


require __DIR__.'/settings.php';
