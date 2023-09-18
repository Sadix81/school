<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\App\V1\CourseController;

Route::as('parents.')->prefix('/parents')->group(function (){
   Route::redirect('/' , CourseController::class);
});
