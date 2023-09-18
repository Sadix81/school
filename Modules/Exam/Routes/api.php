<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Exam\Http\Controllers\App\V1\ExamController;


Route::as('exam.')->prefix('/exam')->group(function (){
        Route::redirect('/' , ExamController::class);
});
