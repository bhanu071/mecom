<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;


class SubcategoryController extends Controller
{
    public function AllSubCategory(){
        $subcategory = Subcategory::latest()->get();
        return view('backend.subcategory.subcategory_all', compact('subcategory'));
    } //End Method

    public function AddSubCategory(){
        $categorys = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.subcategory.subcategory_add', compact('categorys'));
    } //End Method

    public function StoreSubCategory(Request $request){
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name )),               
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } //End Method

    public function EditSubCategory($id){        
        $categorys = Category::orderBy('category_name', 'ASC')->get();
        $subcategory_id = Subcategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('categorys','subcategory_id'));
    } //End Method

    public function UpdateSubCategory(Request $request){
        $subcat_id = $request->id;
        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name )),               
        ]);

        $notification = array(
            'message' => 'SubCategory Updated sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    } //End Method

    public function DeleteSubCategory($id){
        $subcategory = Subcategory::findOrfail($id);
        
        Subcategory::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'SubCategory Deleted Sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } //End Method

    public function GetSubCategory($category_id){
        $subcat = Subcategory::where('category_id, $category_id')->orderBy('ASC')->get();
        return json_encode($subcat);
    } //End Method
}
