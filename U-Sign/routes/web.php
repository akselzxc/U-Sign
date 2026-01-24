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

//Frontline Login interface
Route::get('/login_frontline', [App\Http\Controllers\NavbarController::class, 'login_frontline'])->name('login_frontline');

//Frontlin Sidebarr
Route::get('/Fr_dashboard', [App\Http\Controllers\Fr_SidebarController::class, 'Fr_dashboard'])->name('Fr_dashboard');
Route::get('/fr_messages', [App\Http\Controllers\Fr_SidebarController::class, 'fr_messages'])->name('fr.messages');
Route::get('/fr_logs', [App\Http\Controllers\Fr_SidebarController::class, 'fr_logs'])->name('fr.logs');
//Route::get('/tutorial', function () {
//    return Inertia::render('Frontend/Tutorial');
//})->name('tutorial');
//
//Route::get('/faqs', function () {
//    return Inertia::render('Frontend/Faqs');
//})->name('faqs');


require __DIR__.'/settings.php';
