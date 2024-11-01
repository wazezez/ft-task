<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Box\{ListBoxController, CreateBoxController, UpdateBoxController, UpdateMultipleBoxController, CreateMultipleBoxController};
use App\Http\Controllers\Api\Warehouse\{DetailsWarehouseController};

Route::as('api.')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');

    Route::group(['prefix' => 'boxes', 'as' => 'boxes.'], function() {
        Route::get('/list', ListBoxController::class)->name('list');
        Route::post('/create', CreateBoxController::class)->name('create');
        Route::post('/create-multiple', CreateMultipleBoxController::class)->name('create-multiple');
        Route::post('/update-multiple', UpdateMultipleBoxController::class)->name('update-multiple');
        Route::post('/{box}/update', UpdateBoxController::class)->name('update');
    });

    Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.'], function() {
        Route::get('/details', DetailsWarehouseController::class)->name('details');
    });
});

