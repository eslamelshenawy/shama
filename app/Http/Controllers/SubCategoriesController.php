<?php

namespace App\Http\Controllers;

use App\Photo;
use App\WebmasterSection;
use App\category;
use App\subcategory;
use App\product;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class SubCategoriesController extends Controller
{
    private $uploadPath = "uploads/topics/";


    public function getUploadPath()
    {
        return $this->uploadPath;
    }
    //all category
    public function index(){
        $category=  category::get();

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.subcategories.categories',compact('category','GeneralWebmasterSections'));

    }


//create store_categories
    public function store_subcategories(Request $request){
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        foreach(@$request->section_id  as $cat_id){
            $category= new subcategory;
            $category->photo= $fileFinalName;
            $category->type_id= $request->type_id;
            $category->category_id= $cat_id;
            $category->name_heb= $request->title_heb;
            $category->name_en= $request->title_en;
            $category->status= $request->status;
            $category->icon= $request->icon;
            $category->save();
        }
        return redirect()->route('edit.subcategory',$category->id)->with('message',  trans("backLang.addDone"));
    }

//create store_categories
    public function store_edit_subcategories(Request $request,$id){
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() .rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $category=  subcategory::find($id);
        $category->photo= $fileFinalName;
        $category->type_id= $request->type_id;
        $category->category_id= $request->section_id;
        $category->name_heb= $request->title_heb;
        $category->name_en= $request->title_en;
        $category->status= $request->status;
        $category->icon= $request->icon;
        $category->save();

        return redirect()->route('edit.subcategory',$category->id)->with('message',  trans("backLang.saveDone"));
    }

    //edit sub category
    public function subcategories_edit($id){
        $category=  subcategory::find($id);
//        dd($category);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.subcategories.edit_subgategory',compact('category','GeneralWebmasterSections'));

    }


    //delete_subcategories
    public function delete_subcategories($id){
        $category=  subcategory::find($id);
        $category->delete();
//        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return redirect()->route('subcat')->with('message',  trans("backLang.deleteDone"));


    }

    //create sub category
    public function subcategories(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.subcategories.create_sub_category',compact('GeneralWebmasterSections'));

    }
    //all sub  category
    public function subcat(){
        $subcategory=  subcategory::get();

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.subcategories.subcategories',compact('subcategory','GeneralWebmasterSections'));

    }

}
