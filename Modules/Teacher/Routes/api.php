<?php

use Illuminate\Support\Facades\Route;
use Modules\Teacher\Http\Controllers\App\V1\AuthTeacherController;

Route::as('auth.')->prefix('/auth')->group(function() {
    Route::get('teacher/login/page', [AuthTeacherController::class , 'loginPage'])->name('teacher.LoginPage');
    Route::post('teacher/login', [AuthTeacherController::class , 'login'])->name('teacher.Login');
    Route::get('teacher/register/page', [AuthTeacherController::class , 'registerPage'])->name('teacher.RegisterPage');
    Route::post('teacher/register', [AuthTeacherController::class , 'register'])->name('teacher.Register');
    Route::get('teacher/logout' , [AuthTeacherController::class , 'logout'])->name('teacher.Logout');
    Route::post('teacher/verify' , [AuthTeacherController::class , 'verify'])->name('teacher.verify');
});
