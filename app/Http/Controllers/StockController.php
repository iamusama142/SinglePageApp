<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $data=new Stock();
        $data->stock_name=$request->stock_name;
        $data->stock_ammount=$request->stock_ammount;
        $data->save();
        return redirect()->back()->with('stock_add','Stock Added Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show_data()
    {
        $data=DB::table('stocks')->get();
        return view('Pages.add_stock')->with(compact('data'));
    }

 

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
