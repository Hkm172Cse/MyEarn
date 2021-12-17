<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyCostController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LendingController;



Route::get('/', [AuthController::Class, 'Auth']);
Route::get('/mycost', [DailyCostController::Class, 'index']);
Route::post('/AddCost', [DailyCostController::Class, 'CostMethod']);
Route::get('/getCostData', [DailyCostController::Class, 'getCostData_method']);

Route::post('/selectCostDatewise',  [DailyCostController::Class, 'customDateCost']);
Route::get('/costCatagory', [DailyCostController::Class, 'addcatagory']);
Route::post('/AddCatagory', [DailyCostController::Class, 'catagory_add']);
Route::get('/selectCostCatagory',  [DailyCostController::Class, 'getAllCostCatagory']);

Route::post('/DeleteCatagory', [DailyCostController::Class, 'catagory_delete']);
Route::get('/income', [IncomeController::Class, 'index']);
Route::post('/selectIncomeDatewase',  [IncomeController::Class, 'customDateIncome']);
Route::post('/Add_Income', [IncomeController::Class, 'IncomeMethod']);

Route::get('/lending', [LendingController::Class, 'index']);
Route::post('/AddLending', [LendingController::Class, 'Lending_add_method']);
Route::get('/selectLending',  [LendingController::Class, 'getAllLending']);


