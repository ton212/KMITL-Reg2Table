<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'wizard'], function () {
    Route::get('1')->uses('WizardController@stepOne')->name('wizard.step1');
});

Route::group(['prefix' => 'convert'], function () {
    Route::post('table')->uses('ConverterController@convertToTable')->name('convert.table');
});
