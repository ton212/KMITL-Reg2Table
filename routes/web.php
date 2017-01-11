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
})->name('index');

Route::group(['prefix' => 'wizard'], function () {
    Route::get('1')->uses('WizardController@stepOne')->name('wizard.step1');
    Route::post('1')->uses('WizardController@processStepOne')->name('process.step1');

    Route::get('2')->uses('WizardController@stepTwo')->name('wizard.step2');
    Route::post('2')->uses('WizardController@processStepTwo')->name('process.step2');
});

Route::group(['prefix' => 'convert'], function () {
    Route::get('table')->uses('ConverterController@convertToTable')->name('convert.table');
});
