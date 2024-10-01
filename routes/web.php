<?php

use App\Http\Controllers\BotManController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
//Route::view('/botman/chat', 'botman.chat');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/fees', [HomeController::class, 'fees'])->name('fees');
Route::get('/fields', [HomeController::class, 'fields'])->name('fields');
Route::get('/frequently-asked-questions', [HomeController::class, 'faq'])->name('faq');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/apply', [HomeController::class, 'apply'])->name('apply');
    Route::post('/apply', [InternshipController::class, 'store'])->name('apply.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
