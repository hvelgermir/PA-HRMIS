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
    return view('auth.login');
});

Auth::routes(['verify' => true]); // added array for email verification

Route::get('/users', 'UsersController@index')->middleware('admin')->name('users.index');
Route::get('/users/create', 'UsersController@create')->middleware('admin')->name('users.create');
Route::get('/users/{user}/edit', 'UsersController@edit')->middleware('admin')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->middleware('admin')->name('users.update');
Route::post('/users', 'UsersController@store')->middleware('admin')->name('users.store');
Route::delete('/users/{id}', 'UsersController@destroy')->middleware('admin')->name('users.destroy');

Route::get('/departments', 'DepartmentsController@index')->middleware('admin')->name('departments.index');
Route::get('/departments/create', 'DepartmentsController@create')->middleware('admin')->name('departments.create');
Route::get('/departments/{department}/edit', 'DepartmentsController@edit')->middleware('admin')->name('departments.edit');
Route::post('/departments', 'DepartmentsController@store')->middleware('admin')->name('departments.store');
Route::patch('/departments/{department}', 'DepartmentsController@update')->middleware('admin')->name('departments.update');
Route::delete('/departments/{id}', 'DepartmentsController@destroy')->middleware('admin')->name('departments.destroy');

Route::get('/employees', 'EmployeesController@index')->middleware('admin')->name('employees.index');
Route::get('/employees/create', 'EmployeesController@create')->middleware('admin')->name('employees.create');
Route::post('/employees', 'EmployeesController@store')->middleware('admin')->name('employees.store');
Route::get('/employees/{employee}', 'EmployeesController@show')->middleware('auth')->name('employees.show');
Route::get('/employees/{employee}/edit', 'EmployeesController@edit')->middleware('auth')->name('employees.edit');
Route::patch('/employees/{employee}', 'EmployeesController@update')->middleware('auth')->name('employees.update');
Route::delete('/employees/{id}', 'EmployeesController@destroy')->middleware('admin')->name('employees.destroy');

Route::get('/educations/create/{employee}', 'EducationsController@create')->middleware('auth')->name('educations.create');
Route::get('/educations/{education}/edit', 'EducationsController@edit')->middleware('auth')->name('educations.edit');
Route::post('/educations/{employee}', 'EducationsController@store')->middleware('auth')->name('educations.store');
Route::delete('/educations/{id}', 'EducationsController@destroy')->middleware('auth')->name('educations.destroy');
Route::patch('/educations/{education}', 'EducationsController@update')->middleware('auth')->name('educations.update');

Route::get('/dashboard', 'HomeController@index')->name('home');


