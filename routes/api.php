<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AccountTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\CostCenterController;
use App\Http\Controllers\EntryTypeController;
use App\Http\Controllers\ProfitAndLossController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\TrialBalanceController;

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

Route::post('/AddEntity', 
[EntityController::class,'add_entity']);

Route::get('/Entity', 
[EntityController::class,'all_entities']);

Route::get('/getRelatedEntity', 
[EntityController::class,'get_all_group_of_entities']);

Route::post('/AddCostCenter', 
[CostCenterController::class,'add_cost_center']);

Route::post('/AddEntryType', 
[EntryTypeController::class,'add_entry_type']);

Route::post('/AddAccountType', 
[AccountTypeController::class,'add_account_type']);

Route::post('/AddAccount', 
[AccountsController::class,'add_accounts']);

Route::post('/AddTransactionType', 
[TransactionTypeController::class,'add_transaction_type']);

Route::post('/AddTransaction', 
[TransactionController::class,'add_transaction']);

Route::post('/AddAccount', 
[AccountsController::class,'add_accounts']);

Route::get('/ProfitAndLoss', 
[ProfitAndLossController::class,'profit_and_loss_report']);

Route::get('/TrialBalance', 
[TrialBalanceController::class,'get_trial_balance_using_entity_id']);


