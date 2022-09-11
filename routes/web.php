<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ReportController;

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

//employee routes
Route::get('employee',['as'=>'employee.index','uses'=>'EmployeeController@index']);
Route::get('employee/create',['as'=>'employee.create','uses'=>'EmployeeController@create']);
Route::post('employee/create',['as'=>'employee.store','uses'=>'EmployeeController@store']);
Route::get('employee/edit/{id}',['as'=>'employee.edit','uses'=>'EmployeeController@edit']);
Route::patch('employee/{id}',['as'=>'employee.update','uses'=>'EmployeeController@update']);
Route::delete('employee/{id}',['as'=>'employee.destroy','uses'=>'EmployeeController@destroy']);

//holiday routes
Route::get('holiday',['as'=>'holiday.index','uses'=>'HolidayController@index']);
Route::get('holiday/create',['as'=>'holiday.create','uses'=>'HolidayController@create']);
Route::post('holiday/create',['as'=>'holiday.store','uses'=>'HolidayController@store']);
Route::get('holiday/edit/{id}',['as'=>'holiday.edit','uses'=>'HolidayController@edit']);
Route::patch('holiday/{id}',['as'=>'holiday.update','uses'=>'HolidayController@update']);
Route::delete('holiday/{id}',['as'=>'holiday.destroy','uses'=>'HolidayController@destroy']);

//leave routes
Route::get('leave',['as'=>'leave.index','uses'=>'LeaveController@index']);
Route::get('leave/create',['as'=>'leave.create','uses'=>'LeaveController@create']);
Route::post('leave/create',['as'=>'leave.store','uses'=>'LeaveController@store']);
Route::get('leave/edit/{id}',['as'=>'leave.edit','uses'=>'LeaveController@edit']);
Route::patch('leave/{id}',['as'=>'leave.update','uses'=>'LeaveController@update']);
Route::delete('leave/{id}',['as'=>'leave.destroy','uses'=>'LeaveController@destroy']);

//home and calendar routes
Route::get('calendar',['as'=>'calendar.index','uses'=>'CalendarController@index']);
Route::get('/',['as'=>'calendar.index','uses'=>'CalendarController@index']);

//reports routes
Route::get('leavereport',['as'=>'leave.report','uses'=>'ReportController@leavereport']);
Route::get('leave/export/excel',['as'=>'leave.reportexcel','uses'=>'ReportController@exportexcel']);
Route::get('leave/export/pdf',['as'=>'leave.reportpdf','uses'=>'ReportController@exportpdf']);