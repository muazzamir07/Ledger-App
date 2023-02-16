<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLedgerEntriesRequest;
use App\Http\Requests\UpdateLedgerEntriesRequest;
use App\Models\LedgerEntries;
use Illuminate\Http\Request;

class LedgerEntriesController extends Controller
{
    public function add_transaction(Request $request)
    {
        
        $tt = LedgerEntries::create($request->post());
    
    }
}