<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use App\Product;
use App\Purchases;
use Brian2694\Toastr\Facades\Toastr;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$sales = Sales::
        $sales = Sales::latest()->get();
         return view('sales.index',compact('sales'));
         //dd($sales);
         //return $sales;
         //return Sales::latest(6)->product;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pruchases = Purchases::all();
        return view('sales.create',compact('pruchases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $product_id = $request->rproduct_id;
        //return $product_id;
         //$proTable = Product::find($product_id);
        //return $proTable;
        $FindPorInPur = Purchases::find($product_id);
        //return $FindPorInPur;
        //return $proTable->category_id;
       $quantity_for_sale =  $request->quantity;
       $price_for_sale =  $FindPorInPur->sale_price;
        $toata_price = $quantity_for_sale*$price_for_sale;
        if($FindPorInPur->product_quantity > $quantity_for_sale){
            $sale = new Sales();
            $sale->product_id = $product_id;
            $sale->category_id = $FindPorInPur->category_id;
            $sale->purchases_id = $FindPorInPur->id;
            $sale->quantity = $quantity_for_sale;
            $sale->t_price = $toata_price;
            $sale->save();
            $FindPorInPur->product_quantity = $FindPorInPur->product_quantity - $quantity_for_sale;
            $FindPorInPur->save();
            Toastr::success('Product Sale successfylly','success');
             return redirect()->route('sales.index');

        }else{
            Toastr::error('Product are not in stock','failed');
            return redirect()->route('sales.index');

        }
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$sale = Sales::where('purchases_id',$id)->delete();
        $sale= Sales::find($id);
        $sale->delete();
        Toastr::success('Sales successfylly','success');
        return redirect()->route('sales.index');
    }
}
