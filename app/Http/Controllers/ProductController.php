<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('product')->with(compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'    => 'required|max:255|unique:products',
            'price'   => 'required|min:1',
            'upc'     => 'required|string',
            'image'   => 'required|image',
            'status'  => 'required|string',
        ]);
        if ($request->file('image')) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/product/', $name);
            $save = new Product();
            $save->name = $request->name;
            $save->price = $request->price;
            $save->upc = $request->upc;
            $save->image = $name;
            $save->status = $request->status;
            $save->save();
            return redirect('products');
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
        $product = Product::findOrFail($id);
        return view('edit')->with(compact('product'));
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
    }

    public function updateProduct(Request $request)
    {
        //
        $request->validate([
            'price'   => 'min:1',
            'upc'     => 'string',
            'status'  => 'string',
        ]);
        $update = new Product();
        $id = $request->id;
        if (!empty($request->file('image'))) {
            $name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/product/', $name);
            $update->where('id', $id)->update([
                'name'    => $request->name,
                'price'   => $request->price,
                'upc'     => $request->upc,
                'status'  => $request->status,
                'image'   => $name,
            ]);
        } else {
            $update->where('id', $id)->update([
                'name'    => $request->name,
                'price'   => $request->price,
                'upc'     => $request->upc,
                'status'  => $request->status,
            ]);
        }
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
        Product::find($request->id)->delete();
        return response()->json(['success' => 'Product deleted successfully']);
    }
    /**
     * Remove the Selected resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        //
        $ids = $request->ids;
        Product::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'selected record deleted successfully']);
    }
}
