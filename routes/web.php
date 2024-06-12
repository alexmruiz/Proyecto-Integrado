<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;

Route::get('/', [UserController::class, 'showlanding']);;

Route::get('/log', [UserController::class, 'showlogin'])->name('log');

/************************************ */

Route::get('/registro', [UserController::class, 'showregistro'])->name('registro');


Route::post('/register', [UserController::class, 'registerUser'])->name('register');

/*************************************************** */

Route::get('/recuperar', [UserController::class, 'showrecuperar'])->name('recuperar');

Route::get('/reset', [UserController::class, 'showreset'])->name('reset');


// Función que se ejecuta al enviar el formulario y que enviará el email al usuario
Route::post('/enviar-recuperar-contrasenia', [UserController::class, 'enviarRecuperarContrasenia'])->name('enviar-recuperacion');

// Formulario donde se modificará la contraseña
Route::get('/reiniciar-contrasenia/{token}', [UserController::class, 'formularioRecuperarContrasenia'])->name('formulario-actualizar-contrasenia');

// Función que actualiza la contraseña del usuario
Route::post('/actualizar-contrasenia', [UserController::class, 'actualizarContrasenia'])->name('actualizar-contrasenia');

/*********************************************************************************** */

Route::post('/index', [UserController::class, 'login'])->name('custom-login');

Route::get('/home', [UserController::class, 'logados'])->name('home');

Route::get('/buscar_profesor', [UserController::class, 'searchTeachers'])->name('show.teacher');

Route::get('/inicio', [UserController::class, 'showIndexTeacher'])->name('star.teacher');

/*****************************CALENDARIO*********************************** */
Route::get('/calendario', [EventController::class, 'index'])->name('calendar');

Route::put('/events/{eventId}', [EventController::class, 'update']);

Route::delete('/events/{eventId}', [EventController::class, 'delete']);

Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::get('/teacher/{id}/calendar', [EventController::class, 'show']);

/***************************PERFIL Y CIERRE DE SESIÓN******************************************************** */

Route::get('/perfil', [UserController::class, 'showprofile'])->name('profile');

Route::post('/updateprofile', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/logout', [UserController::class, 'userlogout'])->name('user.logout');


/****************************CHAT************************************* */

Route::get('/chat', [ChatController::class, 'showChat'])->name('show.chat');

Route::get('/conversation/{userId}', [ChatController::class, 'showConversation'])->name('conversation');

Route::get('/messages', [ChatController::class, 'messages'])->name('messages');
    
Route::post('/message', [ChatController::class, 'message'])->name('message');
    


