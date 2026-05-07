<?php

use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');


});


// Route::get('sliders', [SliderController::class,'index'])->name('sliders.index');
Route::resource('sliders',SliderController::class);
// Route::get('/sliders/{slider}',[SliderController::class,'show'])->name('sliders.show');
// Route::put('/sliders/{slider}',[SliderController::class,'update'])->name('sliders.update');


// Route::get('/sliders/{slider}/edit',[SliderController::class,'edit'])->name('sliders.edit');


// Route::get('/sliders/create',[SliderController::class,'create'])->name('sliders.create');

Route::delete('/slider_images/{id}',[SliderController::class,'destroy'])->name('slider_images.destroy');
