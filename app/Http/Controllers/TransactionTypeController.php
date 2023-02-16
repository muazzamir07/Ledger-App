<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storetransaction_typeRequest;
use App\Http\Requests\Updatetransaction_typeRequest;
use App\Models\transaction_type;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function add_transaction_type(Request $request)
    {
        $tt = transaction_type::create($request->post());
        return response()->json($tt,201);
    }
}
