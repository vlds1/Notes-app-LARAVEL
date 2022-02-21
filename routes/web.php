<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()){
        return redirect()->route('notes.index');
    };
    return view('./auth/home');
})->name('index');
Route::name('auth.')->group(function(){
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('notes.index'));
        }
        return view('./auth/login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect(route('index'));
    })->name('logout');

    Route::get('/register', function(){
        if(Auth::check()){
            return redirect(route('notes.index'));
        }
        return view('./auth/register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'save'])->name('register');

});

Route::resource('notes', NoteController::class);
Route::patch('/complete/{id}', [CompleteController::class, 'update'])->name('complete');