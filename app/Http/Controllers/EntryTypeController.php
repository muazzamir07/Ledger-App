<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntryTypeRequest;
use App\Http\Requests\UpdateEntryTypeRequest;
use App\Models\EntryType;
use Illuminate\Http\Request;

class EntryTypeController extends Controller
{
    public function add_entry_type(Request $request)
    {
        $entry = EntryType::create($request->post());
        return response()->json($entry,201);
    }
    
}
