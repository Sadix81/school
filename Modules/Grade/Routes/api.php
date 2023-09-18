<?php

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;
use Modules\Grade\Http\Controllers\App\V1\GradeController;


Route::as('gallery.')->prefix('/gallery')->group(function (){
    Route::resource('/' , GradeController::class);
});
