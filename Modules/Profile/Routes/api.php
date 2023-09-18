<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Profile\Http\Controllers\App\V1\ProfileController;


Route::as('profile.')->prefix('/profile')->group(function (){
    Route::resource('/' , ProfileController::class);
});
