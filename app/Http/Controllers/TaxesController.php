<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoretaxesRequest;
use App\Http\Requests\UpdatetaxesRequest;
use App\Models\taxes;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretaxesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretaxesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function show(taxes $taxes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function edit(taxes $taxes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetaxesRequest  $request
     * @param  \App\Models\taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetaxesRequest $request, taxes $taxes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\taxes  $taxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(taxes $taxes)
    {
        //
    }
}
