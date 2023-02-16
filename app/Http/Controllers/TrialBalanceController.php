<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Entity;
use App\Traits\SelfReferenceTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\Unit\entity as UnitEntity;

class TrialBalanceController extends Controller
{
    //
//    use SelfReferenceTrait;

    public function get_trial_balance_using_entity_id(Request $request)
    {

        
        $data1= DB::table('accounts') //get total revenue in that time period
        ->join('entities','entities.id','=','accounts.entity_id')
        ->join('account_types','account_types.id','=','accounts.account_type_id')
        ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
        ->where('entities.id','=','1')
        //->distinct()
        ->select('accounts.id','account_types.name')
        ->get();
        
        
        $join1= $data1->pluck('id');
        $join2= $data1->pluck('account_types.name');
        
        /*
        $join=DB::select(DB::raw('Select *
        FROM accounts
        INNER JOIN entities
        ON accounts.entity_id = entities.id
        INNER JOIN ledger_entries
        ON ledger_entries.account_id = accounts.id GROUP BY ledger_entries.account_id;'));
        */

    
        //$d=$data1->toArray();
        
        
 //       for($y=0;$y<sizeof($data1);$y++)
        //$a=$data1[0];
        $data2= DB::table('accounts') //get total revenue in that time period
        ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
        ->join('account_types','account_types.id','=','accounts.account_type_id')
        ->where('accounts.id','=','3')
        ->pluck('account_types.name')
        
//      ->get()
        ;

        

        
        //sizeof($count)
        /*
        for ($x = 0; $x <= sizeof($data1); $x++)
        {
            
            $reveue= DB::table('accounts') //get total revenue in that time period
            ->join('account_types','accounts.account_type_id','=','account_types.id')
            ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
            ->join('entities','ledger_entries.entity_id','=','entities.id')
            ->where('ledger_entries.created_at','>=',date('2022-08-25'))
            ->where('account_types.name','=','Revenue')
            ->orWhere('account_types.name','=','Liability')
            ->orWhere('account_types.name','=','Equity')
            ->where('ledger_entries.credit/debit','=','1')
            ->where('entities.id','=','1')//input the entity id for pnl of entity
            ->sum('ledger_entries.amount');
            //->selectRaw('sum(ledger_entries.amount) as total_add, entities.name')
            //->select('ledger_entries.amount','entities.name')
            //->get()
            //->last()
    

            $transactions[$x]= DB::table('accounts') //get total revenue in that time period
            ->join('account_types','accounts.account_type_id','=','account_types.id')
            ->join('ledger_entries','ledger_entries.account_id','=','accounts.id')
            ->join('entities','ledger_entries.entity_id','=','entities.id')
            ->where('ledger_entries.created_at','>=',date('2022-08-25'))
            ->where('account_types.name','=','Expenses')
            ->orWhere('account_types.name','=','Assets')
            ->where('ledger_entries.credit/debit','=','0')
            ->where('entities.id','=','1')    
            ->where('ledger_entries.entry_type','=','1')    
            ->sum('ledger_entries.amount');
    
        }
        */
        return response()->json($data1,201);

    }

}

/*  
        $department = Entity::find(4);
        $allChildren = $department->allChildren;
        //$data = DB::table()        
*/