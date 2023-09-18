<?php

use Illuminate\Support\Facades\Route;
use Modules\Gallery\Http\Controllers\App\V1\GalleryController;


Route::as('gallery.')->prefix('/gallery')->group(function (){
    Route::resource('/' , GalleryController::class);
});
