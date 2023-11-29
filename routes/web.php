<?php

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException as ValidationValidationException;

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

    ///sirve para validar los campos de nuestro formulario
    $credential = request()->validate([
        'email' => ['required', 'email', 'string'],
        'password' => ['required', 'string']
    ]);




    if (Auth::attempt($credential)) {
        request()->session()->regenerate();
        return redirect('dashboard')->with('status', 'Estas logueado');;
    }
    //redirecciona al login
    //el with se utiliza para mandar un mensaje
    return redirect('login');
    // dump($credential) imprimir las variable


});

//request()->only('email','password')