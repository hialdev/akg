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
        $gmenus = BrandMenu::where('brand_id', $brand->id)->where('location_id', null)->get();
        $lmenus = Location::where('brand_id', $brand->id)->with('brandMenus')->get();

        return view('brands.show', compact('brand','gmenus', 'lmenus'));
    }
}
