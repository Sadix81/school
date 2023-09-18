<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\App\V1\AuthStudentController;


Route::as('auth.')->prefix('/auth')->group(function() {

    Route::get('student/login/page', [AuthStudentController::class , 'loginPage'])->name('student.LoginPage');
    Route::post('student/login', [AuthStudentController::class , 'login'])->name('student.Login');
    Route::get('student/register/page', [AuthStudentController::class , 'registerPage'])->name('student.RegisterPage');
    Route::post('student/register', [AuthStudentController::class , 'register'])->name('student.Register');
    Route::get('student/logout' , [AuthStudentController::class , 'logout'])->name('student.Logout');


    Route::post('student/verify' , [AuthStudentController::class , 'verify'])->name('student.verify');
});
