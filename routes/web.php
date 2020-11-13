<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/companies/all', '\App\Http\Controllers\CompanyController@getAllCompanies')
    ->name('companies.all')
    ->middleware('guest');
Route::post('/companies/save', '\App\Http\Controllers\CompanyController@saveCompany')->name('companies.save');
Route::get('/companies/{id}/edit', '\App\Http\Controllers\CompanyController@editCompany')->name('companies.edit');
Route::post('/companies/{id}/update', '\App\Http\Controllers\CompanyController@updateCompany')->name('companies.update');
Route::post('/companies/delete', '\App\Http\Controllers\CompanyController@deleteCompany')->name('companies.delete');

Route::get('/employees/all', '\App\Http\Controllers\EmployeeController@getAllProducts')
    ->name('employees.all')
    ->middleware('guest');
Route::post('/employees/save', '\App\Http\Controllers\EmployeeController@saveProduct')->name('employees.save');
Route::get('/employees/{id}/edit', '\App\Http\Controllers\EmployeeController@editProduct')->name('employees.edit');
Route::post('/employees/{id}/update', '\App\Http\Controllers\EmployeeController@updateProduct')->name('employees.update');
Route::post('/employees/delete', '\App\Http\Controllers\EmployeeController@deleteProduct')->name('employees.delete');
