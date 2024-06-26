<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Models\User;
use Image;

class ProductController extends Controller
{
    public function AllProduct(){
        $product = Product::latest()->get();
        return view('backend.product.product_all', compact('product'));
    } //End Method

    public function AddProduct(){
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $brands = Brand::latest()->get(); 
        $categories = Category::latest()->get(); 
         
        return view('backend.product.product_add', compact('brands', 'categories', 'activeVendor'));
    } //End Method

}
