<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use App\Product;
use App\Purchases;
use App\Sales;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        Toastr::success('Category Add successfylly','success');
        return redirect()->route('category.index');

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
        $category = Category::find($id);
        return view('category.edit',compact('category'));
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
        $request->validate([
            'name' => 'required'
        ]);
        
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Toastr::success('Category Update successfylly','success');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delPro = Product::where('category_id',$id)->delete();
        $delPur = Purchases::where('category_id',$id)->delete();
        $delSales = Sales::where('category_id',$id)->delete();
        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category Delete successfylly','success');
        return redirect()->route('category.index');
    }
}
