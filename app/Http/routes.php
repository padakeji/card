<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/merchant/company/create', ['uses' => 'Merchant\CompanyController@create', 'as' => 'merchant.company.create']);
    Route::post('/merchant/company', ['uses' => 'Merchant\CompanyController@store', 'as' => 'merchant.company.store']);
    Route::get('/merchant/employee/index', ['uses' => 'Merchant\EmployeeController@index', 'as' => 'merchant.employee.index']);
    Route::get('/merchant/employee/create', ['uses' => 'Merchant\EmployeeController@create', 'as' => 'merchant.employee.create']);
    Route::post('/merchant/employee', ['uses' => 'Merchant\EmployeeController@store', 'as' => 'merchant.employee.store']);

});

Route::get('/card/{employeeId}', ['uses' => 'Card\IndexController@index', 'as' => 'card.index.index']);