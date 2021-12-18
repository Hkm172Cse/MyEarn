<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyCostController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\BorrowController;



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
Route::post('/lending_single_row_catch', [LendingController::Class, 'selectEditData']);

Route::post('/payLending', [LendingController::Class, 'payLendingMethod']);
Route::get('/incomeCatagory', [IncomeController::Class, 'addcatagory']);
Route::get('/selectIncomeCatagory',  [IncomeController::Class, 'getAllCostCatagory']);
Route::post('/AddIncomeCatagory', [IncomeController::Class, 'catagory_add']);

Route::post('/DeleteIncomeCatagory', [IncomeController::Class, 'catagory_delete']);
Route::get('/borrow', [BorrowController::Class, 'index']);
Route::get('/selectBorrow',  [BorrowController::Class, 'getAllBorrow']);
Route::post('/AddBorrow', [BorrowController::Class, 'Borrow_add_method']);

Route::post('/borrow_single_row_catch', [BorrowController::Class, 'selectEditData']);
Route::post('/payBorrow', [BorrowController::Class, 'payBorrowMethod']);

