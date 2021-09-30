<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;
class SalesController extends Controller
{
    public function addPage($id){
        return view('sales.add',compact('id'));
    }
    public function add(Request $request){
//        $Product = new Product();
        $Product = Product::find($request->id);
        $Product->count -= $request->count;
        $Product->save();
        $Sales = new Sales();
        $Sales->user_id = auth()->user()->id;
        $Sales->product_id = $Product->id;
        $Sales->productname = $Product->name;
        $Sales->buyer = $request->buyer;
        $Sales->count = $request->count;
        $Sales->price = $Product->newprice;
        $totalprice = $Product->newprice * $request->count;
        $Sales->totalprice = $totalprice;
        $Sales->save();

        return redirect('/');

    }
}
