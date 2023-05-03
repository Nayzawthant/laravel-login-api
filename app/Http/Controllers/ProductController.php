<?php

namespace App\Http\Controllers;
use App\Models\Prouct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return Prouct::all();
    }
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
        return Prouct::create($request->all());
    }

    public function show($id) {
        return Prouct::find($id);
    }

    public function update(Request $request, $id) {
        $product = Prouct::find($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id) {
        return Prouct::destroy($id);
    }

    public function search($name) {
        return Prouct::where('name', 'like', '%'.$name.'%')->get();
    } 
}
