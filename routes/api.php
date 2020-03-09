<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/student','StudentController');
Route::apiResource('/qualifications','QualificationController');
Route::apiResource('/category','CategoryController');

// Route::get('/student', 'StudentController@index');
// Route::get('/student/{id}', 'StudentController@show');
// Route::post('/student', 'StudentController@store');
// Route::put('/student/{id}', 'StudentController@update');
// Route::delete('/student/{id}', 'StudentController@destroy');
Route::get('/registerStudent', 'StudentController@registerStudent')->name('registerStudent');
Route::get('/withOutRegister', 'StudentController@withOutRegister')->name('withOutRegister');
Route::post('/filter', 'StudentController@filter')->name('filter');
Route::post('/login', 'StudentController@login')->name('login');
Route::post('/approed', 'StudentController@setApproed')->name('approed');