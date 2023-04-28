<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //********** Paginate *****************
        // $product = Product::latest()->paginate(10);
        // return response()->json($product);

        $product = Product::get();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
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
        $password = $request->password;
        $password = Hash::make($password);
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return response()->json([
            'message' => 'Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            "message" => "Deleted Successfuly",
        ]);
    }
}
