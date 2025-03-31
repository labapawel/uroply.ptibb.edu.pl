<?php

use App\Http\Controllers\ProfileController;
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
    return view('strony.index');
})->name('home');
Route::get('/a', function () {
    return view('strony.index1');
})->name('home1');
Route::get('/site/{url}', function ($url) {
    return view('strony.index2', ['url' => $url]);
})->name('home2');

Route::get('/test', [App\Http\Controllers\TestController::class, 'test'])->name('test');


// Dodanie trasy do zmiany języka
Route::get('language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'pl'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language.switch');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
