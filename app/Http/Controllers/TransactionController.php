<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\LedgerEntries;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Generator\StringManipulation\Pass\ClassNamePass;

class TransactionController extends Controller
{
    public function add_transaction(Request $request)
    {
        //tt has transaction id number.
        $tt = Transaction::create($request->post())->id;
        
//        return response()->json($request,201);

        $input=[
            'id' => $request->id,
            'description' => $request->description,
            'transaction_type_id' => $request->transaction_type_id,
        //    'account_id' => $request->account_id,
            'amount' => $request->amount,
            'tax_id' => $request->tax_id,
            'current_amount' => $request->current_amount,
            'from_account' => $request->account_id1,
            'to_account' => $request->account_id2,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'cost_center_id' => $request->cost_center_id,
        ];



//        return response()->json($input,201);


        $data3= DB::table('accounts')
        ->join('transactions','accounts.id','=','transactions.account_id1')
        ->join('account_types','accounts.account_type_id','=','account_types.id')
        ->where('transactions.account_id1','=',$input['from_account'])
        //->where('transactions.id','=',$input['from_account'])
        //->select('accounts.current_balance')
        ->get()->last();


        $data4= DB::table('accounts')
        ->join('transactions','accounts.id','=','transactions.account_id2')
        ->join('account_types','accounts.account_type_id','=','account_types.id')
        //->where('transactions.account_id1','=',$input['from_account'])
        ->where('transactions.account_id2','=',$input['to_account'])
        //->select('accounts.current_balance')
        ->get()->last();


//        return response()->json($data3,201);

        $b1=$data3->current_balance;
        $b2=$data4->current_balance;

        //1 means it is credit and 2 mean debit
        //Credit debit implementation below
        if($data3->transaction_type_id==1)
        {
            if($data3->name=="Revenue" || $data3->name=="Equity" || $data3->name=="Liabilities")
            {
                $b1=$b1+$data3->amount;
                $b2=$b2-$data4->amount;
            }
            else if($data3->name=="Expenses" || $data3->name=="Assets")
            {
                $b1=$b1-$data3->amount;
                $b2=$b2+$data4->amount;
            }

            else
            {
                return response()->json("Wrong Input",400);
            }

            
        }
        

        if($data3->transaction_type_id==2)
        {
            if($data3->name=="Revenue" || $data3->name=="Equity" || $data3->name=="Liabilities")
            {    
                $b1=$b1-$data3->amount;
                $b2=$b2+$data4->amount;
            }
            else if($data3->name=="Expenses" || $data3->name=="Assets")
            {
                $b1=$b1+$data3->amount;
                $b2=$b2-$data4->amount;
            }

            else
            {
                return response()->json("Wrong Input",400);
            }


        }
    //Updates both Account Balance    
        Accounts::where('id','=',$data3->account_id1)
            ->update(['current_balance' => $b1]);
        
        Accounts::where('id','=',$data4->account_id2)
        ->update(['current_balance' => $b2]);

        

//       return response()->json($data3,201);
        

//flags hold transactin type data, true when credit and false when debit.
        if($data3->transaction_type_id==1)
        {
            $flag1=1;
            $flag2=0;
        }
        else if($data3->transaction_type_id==2)
        {
            $flag2=1;
            $flag1=0;
        }

    //Record Ledger Entries of both debit and credit transaction.    
        $ledgerData1=[
            'description'=>$data3->description,
            'entry_type_id'=>1,
            'entity_id'=>$data3->entity_id,
            'account_id'=>$data3->account_id1,
            'transaction_id'=>$tt,
            'cost_center_id'=>$data3->cost_center_id,
            'amount'=>$data3->amount,
            'credit/debit'=>$flag1,
            'current_balance'=>$b1,

        ];
    
        $ledgerData2=[
            'description'=>$data4->description,
            'entry_type_id'=>1,
            'entity_id'=>$data4->entity_id,
            'account_id'=>$data4->account_id2,
            'transaction_id'=>$tt,
            'cost_center_id'=>$data4->cost_center_id,
            'amount'=>$data4->amount,
            'credit/debit'=>$flag2,
            'current_balance'=>$b2,

        ];

        $tt = LedgerEntries::create($ledgerData1);
        
        $tt = LedgerEntries::create($ledgerData2);
        return response()->json($ledgerData1,201);

}

}
