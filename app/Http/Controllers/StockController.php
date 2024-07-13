<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //fetching data 
    public function index()
    {
       
    $stocks = collect();

    Stock::where('status', 1)->chunk(1000, function ($chunk) use ($stocks) {
        foreach ($chunk as $stock) {
            $stocks->push($stock);
        }
    });

    return view('dashboard/dashboard-02', ['stocks' => $stocks]);
}
   
}
