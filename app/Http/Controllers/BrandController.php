<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandMenu;
use App\Models\Location;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('brands.index');
    }

    public function show($slug){
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $menus = BrandMenu::where('brand_id', $brand->id)->get();

        return view('brands.show', compact('brand','menus'));
    }
}
