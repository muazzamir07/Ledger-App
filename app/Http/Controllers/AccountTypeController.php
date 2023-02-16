<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountTypeRequest;
use App\Http\Requests\UpdateAccountTypeRequest;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountTypeController extends Controller
{
    public function add_account_type(Request $request)
    {
        $account = AccountType::create($request->post());
        return response()->json($account,201);
    }
  
}
