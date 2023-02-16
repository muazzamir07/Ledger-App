<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountsRequest;
use App\Http\Requests\UpdateAccountsRequest;
use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function add_accounts(Request $request)
    {
        $account = Accounts::create($request->post());
        
        return response()->json($request,201);
    }
}
