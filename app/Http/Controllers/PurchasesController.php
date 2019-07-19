<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchases;
use App\Product;
use App\Sales;
use Brian2694\Toastr\Facades\Toastr;
class PurchasesController extends Controller
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
        $purchases = Purchases::latest()->get();
        return view('purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('purchases.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        //return $product_id;
        $ProTable = Product::find($product_id);
        $purFind = Purchases::find($product_id);
        $newP = new Purchases();
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'r_price' => 'required',
            's_price' => 'required',
        ]);
        if($purFind == true){
            
                $purFind->product_id = $product_id;
            $purFind->category_id = $ProTable->category_id;
            $purFind->product_quantity = $request->quantity;
            $purFind->retail_price = $request->r_price;
            $purFind->sale_price = $request->s_price;
            $purFind->save();
            Toastr::success('Puchases Update successfylly','success');
            return redirect()->route('purchases.index');
            
        }else{
            $newP->product_id = $product_id;
            $newP->category_id = $ProTable->category_id;
            $newP->product_quantity = $request->quantity;
            $newP->retail_price = $request->r_price;
            $newP->sale_price = $request->s_price;
            $newP->save();
            Toastr::success('Puchases add successfylly','success');
            return redirect()->route('purchases.index');
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
        if(Sales::find($id)){
            $delSales = Sales::where('purchase_id',$id)->delete();
        }
        
        $pur = Purchases::find($id);
        $pur->delete();
        Toastr::success('Purchases Delete successfylly','success');
        return redirect()->route('purchases.index');
    }
}
