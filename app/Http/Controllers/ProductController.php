<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // show data
    public function index()
    {
        $data = Product::all();

        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $data
        ], 200);
    }

    // show data by id
    public function show($id)
    {
        $data = Product::find($id);
        if($data){
            return $data;
        }else{
        return ["message" => "Data not found"];
        }
    }

   // add data
    public function store(Request $request)
    {
        $store = Product::create($request->all());

        //return $store;
        return response()->json([
            "message" => "Create data success",
            "data" => $store
        ], 200);
    }

    // update product
    public function update(Request $request, $id)
    {
        $update = Product::where("id", $id)->update($request->all());
        
        // return $update;
         return response()->json([
            "message" => "Update data success",
            "data" => $update
        ], 200);
    }

    // delete product
    public function destroy($id)
    {
        $data = Product::where("id", $id);
        if($data){
            $data->delete();
            return["message" => "Delete Success"];
        }else{
            return["message" => "Data not found"];
        }
    }
}