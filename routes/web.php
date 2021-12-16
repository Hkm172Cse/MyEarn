<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyCostController;



Route::get('/', [AuthController::Class, 'Auth']);
Route::get('/mycost', [DailyCostController::Class, 'index']);
Route::post('/AddCost', [DailyCostController::Class, 'CostMethod']);
Route::get('/getCostData', [DailyCostController::Class, 'getCostData_method']);

Route::post('/selectCostDatewise',  [DailyCostController::Class, 'customDateCost']);
Route::get('/costCatagory', [DailyCostController::Class, 'addcatagory']);
Route::post('/AddCatagory', [DailyCostController::Class, 'catagory_add']);
Route::get('/selectCostCatagory',  [DailyCostController::Class, 'getAllCostCatagory']);

