<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Entity;


class EntityController extends Controller
{
    //add a new entity/company 
    public function add_entity(Request $request)
    {
        $entity = Entity::create($request->post());
        return response()->json($entity,201);
    }


    public function all_entities(Request $request)
    {
        $entity = Entity::all();
        return response()->json($entity,200);
    }

    public function get_all_group_of_entities()
    {
        $entity = Entity::where('id', '=', 1)->orWhere('parent_id','=',1)->get();
        
        return response()->json($entity,200);
    }
}





/*
[    
        'name' => $request->name,
        'description' => $request->description,
        'parent_id' => $request->parent_id,
        'created_at' => $request->created_at,
        'updated_at' => $request->updated_at,
    ]
*/