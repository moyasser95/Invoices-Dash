<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections=Section::all();
        $products=Product::with('section')->get(); //select * from products
        return view('products.product',compact('products','sections'));//passing data to views
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Product::create([
            'Product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('Add', 'تم اضافة المنتج بنجاح ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = Section::where('section_name', $request->section_name)->first()->id;

        $Products = Product::findOrFail($request->pro_id);

        $Products->update([
        'Product_name' => $request->Product_name,
        'section_id' => $id,
        'description' => $request->description,
        ]);

        return redirect()->route( 'products.index')->with('Edit', 'تم تعديل المنتج بنجاح') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Products = Product::findOrFail($request->pro_id);
        $Products->delete();
        
        return back()->with('delete', 'تم حذف المنتج بنجاح');
    }
}
