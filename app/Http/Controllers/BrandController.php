<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        return view('admin.brand.add-brand');
    }

    public function saveBrand(Request $request) {

        $this->validate($request, [
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
            'brand_description' => 'required'
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect('/brand/add')->with('message', 'Brand info save');
    }

    public function manageBrand() {
        $brands = Brand::all();
        return view('admin.brand.manage-brand', ['brands'=>$brands]);
    }
}
