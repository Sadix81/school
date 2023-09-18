<?php

use Illuminate\Support\Facades\Route;
use Modules\Parents\Http\Controllers\App\V1\AuthParentController;


Route::as('auth.')->prefix('/auth')->group(function() {
    Route::get('parents/login/page', [AuthParentController::class , 'loginPage'])->name('parents.LoginPage');
    Route::post('parents/login', [AuthParentController::class , 'login'])->name('parents.Login');
    Route::get('parents/register/page', [AuthParentController::class , 'registerPage'])->name('parents.RegisterPage');
    Route::post('parents/register', [AuthParentController::class , 'register'])->name('parents.Register');
    Route::get('parents/logout' , [AuthParentController::class , 'logout'])->name('parents.Logout');
    Route::post('parents/verify' , [AuthParentController::class , 'verify'])->name('parents.verify');

});
