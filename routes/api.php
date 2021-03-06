<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TitleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employee', EmployeeController::class);
Route::apiResource('department', DepartmentController::class);
Route::apiResource('salary', SalaryController::class);
Route::apiResource('title', TitleController::class);
Route::get('/employee/filter/{query}', [EmployeeController::class, 'filter']);
