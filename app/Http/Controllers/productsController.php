<?php

namespace App\Http\Controllers;

use App\Photo;
use App\setting_filter;
use App\WebmasterSection;
use App\category;
use App\subcategory;
use App\product;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class productsController extends Controller
{

    private $uploadPath = "uploads/topics/";


    public function getUploadPath()
    {
        return $this->uploadPath;
    }
    //all category
    public function index(){
        $category=  category::where('status', '=', '1')->get();

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.products.categories',compact('category','GeneralWebmasterSections'));

    }


    //all products
    public function products(){
        $products=  product::get();
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.products.products',compact('products','GeneralWebmasterSections'));
    }
  //create  products
    public function create_products(){
        $setting_filter = setting_filter::find(1);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.products.create_products',compact('GeneralWebmasterSections','setting_filter'));
    }


    //create store_categories
    public function store_products(Request $request){
//        dd($request->all());
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

            $products= new product;
            $products->photo= $fileFinalName;
            $products->category_id= $request->category_id ;
            $products->subcategory_id= $request->subcate_id ;
            $products->name_heb= $request->title_heb;
            $products->details_il= $request->details_il;
            $products->details_en= $request->details_en;
            $products->brand_id= $request->brand_id;
            $products->name_en= $request->title_en;
            $products->status= $request->status;
            $products->icon= $request->icon;
            $products->price= $request->price;
            $products->style_id= $request->style_id;
            $products->special_price= $request->spcialprice;
            $products->date_end_price= $request->date_end_price;
            $products->type_men= $request->type_men;
            $products->seller= $request->seller;
            $products->standard_gold= $request->standard_gold;
            $products->natural= $request->natural;

        $products->save();

        return redirect()->route('edit.products',$products->id)->with('message',  trans("backLang.addDone"));
    }

    //edit products
    public function edit_products($id){
        $products=  product::find($id);
//        dd($category);
        $setting_filter = setting_filter::find(1);

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.products.edit_products',compact('products','GeneralWebmasterSections','setting_filter'));

    }


    //edit store_categories
    public function store_edit__products(Request $request){
//        dd($request->all());
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $products= new product;
        $products->photo= $fileFinalName;
        $products->category_id= $request->category_id ;
        $products->subcategory_id= $request->subcate_id ;
        $products->name_heb= $request->title_heb;
        $products->brand_id= $request->brand_id;
        $products->name_en= $request->title_en;
        $products->details_il= $request->details_il;
        $products->details_en= $request->details_en;
        $products->status= $request->status;
        $products->icon= $request->icon;
        $products->price= $request->price;
        $products->style_id= $request->style_id;
        $products->special_price= $request->spcialprice;
        $products->date_end_price= $request->date_end_price;
        $products->type_men= $request->type_men;
        $products->seller= $request->seller;
        $products->standard_gold= $request->standard_gold;
        $products->natural= $request->natural;

        $products->save();

        return redirect()->route('edit.products',$products->id)->with('message',  trans("backLang.saveDone"));
    }


    //delete_products
    public function delete_products($id){
        $category=  subcategory::find($id);
        $category->delete();
//        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return redirect()->route('products')->with('message',  trans("backLang.deleteDone"));


    }

    public function photos(Request $request, $id){

        $next_nor_no = Photo::where('product_id', '=', $id)->max('row_no');
        if ($next_nor_no < 1) {
            $next_nor_no = 1;
        } else {
            $next_nor_no++;
        }

        // Start of Upload Files
        $formFileName = "file";
        $fileFinalName = "";
        $fileFinalTitle = ""; // Original file name without extension
        if ($request->$formFileName != "") {
            $fileFinalTitle = basename($request->file($formFileName)->getClientOriginalName(),
                '.' . $request->file($formFileName)->getClientOriginalExtension());
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }
        // End of Upload Files
        if ($fileFinalName != "") {
            $Photo = new Photo;
            $Photo->row_no = $next_nor_no;
            $Photo->file = $fileFinalName;
            $Photo->title = $fileFinalTitle;
            $Photo->product_id = $id;
            $Photo->created_by = Auth::user()->id;
            $Photo->save();

            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }

    }


}
