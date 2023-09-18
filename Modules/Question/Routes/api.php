<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Question\Http\Controllers\App\V1\QuestionController;


Route::as('question.')->prefix('/question')->group(function(){
    Route::resource('/' ,QuestionController::class);
});

Route::as('questionitem.')->prefix('/questionitem')->group(function(){
    Route::resource('/' ,QuestionController::class);
});
