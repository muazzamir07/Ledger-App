<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfitAndLossController extends Controller
{
    //

    public function profit_and_loss_report()
    {

        
        
        $reveue= DB::table('accounts') //get total revenue in that time period
        ->join('account_types','accounts.account_type_id','=','account_types.id')
        ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
        ->join('entities','ledger_entries.entity_id','=','entities.id')
        ->where('ledger_entries.created_at','>=',date('2022-08-25'))
        ->where('account_types.name','=','Revenue')
        ->where('ledger_entries.credit/debit','=','1')
        ->where('entities.id','=','1')//input the entity id for pnl of entity
        ->sum('ledger_entries.amount');
        //->selectRaw('sum(ledger_entries.amount) as total_add, entities.name')
        //->select('ledger_entries.amount','entities.name')
        //->get()
        //->last()

        $expenses= DB::table('accounts') //get total revenue in that time period
        ->join('account_types','accounts.account_type_id','=','account_types.id')
        ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
        ->join('entities','ledger_entries.entity_id','=','entities.id')
        ->where('ledger_entries.created_at','>=',date('2022-08-25'))
        ->where('account_types.name','=','Expenses')
        ->where('ledger_entries.credit/debit','=','0')
        ->where('entities.id','=','1')//input the entity id for pnl of entity
        ->sum('ledger_entries.amount');


        //To calculate pnl

        $pnl= $reveue-$expenses;
        
        if($pnl<0 )
        {
            return response()->json(["'Loss':'$pnl'"],201);
        }
        else if($pnl >=0)
        {
            return response()->json(["'Profit':'$pnl'"],201);
        }
/*
        $data= DB::table('ledger_entries')
        ->where('credit/debit','1')
        ->sum('amount')
        
        //->get()
        ;
*/
/*
    $data=LedgerEntries::Where('credit/debit','0')
    //->Where('credit/debit','1')
    ->select('account_id',)
    ->selectRaw("SUM(amount) as total_debit")
    ->selectRaw("SUM(amount) as total_credit")
    ->groupBy('account_id')
    ->get();
*/



    }
}
