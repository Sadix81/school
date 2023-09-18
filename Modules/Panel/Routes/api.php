<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Panel\Http\Controllers\App\V1\PanelController;
use Modules\Panel\Http\Controllers\App\V1\PurchaseController;

Route::as('panel.')->prefix('/panel')->group(function (){
   Route::resource('/' , PanelController::class);
});

Route::as('purchase.')->prefix('/purchase')->group(function (){
    Route::resource('/' , PurchaseController::class);
});
