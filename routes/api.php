<?php

use App\Http\Controllers\Api\PdfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('convert')->group(function(){
    Route::post('html', [PdfController::class, 'fromHtml']);

});
