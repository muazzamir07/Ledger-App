<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\CostCenter;

class CostCenterController extends Controller
{
    //
    public function add_cost_center(Request $request)
    {
        $cost = CostCenter::create($request->post());
        return response()->json($cost,200);
    }

    public function cost_center_accounts()
    {
        
        
    }

}
