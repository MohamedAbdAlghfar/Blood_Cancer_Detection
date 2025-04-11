<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PredictionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); 

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about'); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/predict', [PredictionController::class, 'predict'])->name('predict');
});

Route::get('/contact', function () {
    return view('contact');
});

 
Route::get('/history', [HistoryController::class, 'index'])->middleware(['auth', 'verified'])->name('history'); 

Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');

require __DIR__.'/auth.php';  
