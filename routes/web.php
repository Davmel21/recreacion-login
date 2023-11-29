<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'welcome');
///el name se usa para darle un nombre a la ruta
//el middleware guest te permite solo entrar a la ruta si eres un usuario invitado
Route::view('/login', 'login')->name('login')->middleware('guest');
///solo permite que  usuarios autenticados entren a esta ruta
Route::view('/dashboard', 'dashboard')->middleware('auth');



///para retornar el objeto con sus propiedades y valores del formulario se usa : request()
Route::post('/login', function () {
    $credential = request()->only('email', 'password');
    if (Auth::attempt($credential)) {
        request()->session()->regenerate();
        return redirect('dashboard');
    }
    return redirect('login');
    // dump($credential) imprimir las variable
});

//request()->only('email','password')