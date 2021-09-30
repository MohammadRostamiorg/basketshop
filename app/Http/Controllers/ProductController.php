<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Sales;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::where('user_id',auth()->user()->id)->get();
        $sales = Sales::where('user_id',auth()->user()->id)->get();
        return view('index',compact('products','sales'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request['name']);
        $Product = new Product();
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->newprice = $request->newprice;
        $Product->count = $request->count;
        $Product->user_id = auth()->user()->id;
        $Product->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Product::where('id',$id)->get();
        return view('edit',compact('info','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Product = Product::find($id);
        $Product->name = $request->name;
        $Product->price = $request->price;
        $Product->newprice = $request->newprice;
        $Product->count = $request->count;
        $Product->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $sales = Sales::where('product_id',$product->id);
//        dd($sales);
        $sales->delete();
        $product->delete();
        return redirect('/');
    }
}
