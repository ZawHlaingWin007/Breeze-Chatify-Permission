<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Gate;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    // abort_if(Gate::denies('dashboard.index'), 403);
    // $this->authorize('dashboard.index');
    return view('dashboard');
})->middleware(['auth', 'verified', 'setLocale'])->name('dashboard');


Route::get('lang/{lang}', LanguageController::class)->name('lang.switch');

Route::middleware(['auth', 'setLocale'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
