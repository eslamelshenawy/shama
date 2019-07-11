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

class CategoriesController extends Controller
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

        return view('backEnd.categories.categories',compact('category','GeneralWebmasterSections'));

    }

    //create category
    public function categories(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.categories.create_gategory',compact('GeneralWebmasterSections'));

    }

    //edit category
    public function categories_edit($id){
        $category=  category::find($id);
//        dd($category);
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.categories.edit_gategory',compact('category','GeneralWebmasterSections'));

    }

    //edit store_categories
    public function store_edit_categories(Request $request,$id){

        $category=  category::find($id);
        $category->name_heb= $request->title_heb;
        $category->name_en= $request->title_en;
        $category->status= $request->status;
        $category->icon= $request->icon;

        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $category->photo= $fileFinalName;
        $category->save();
//        dd($category);
        return redirect()->route('edit.category',$category->id)->with('message',  trans("backLang.saveDone"));
//        return view('backEnd.categories.edit_gategory',compact('GeneralWebmasterSections'));

    }



    //create store_categories
    public function store_categories(Request $request){

        $category= new category;
        $category->name_heb= $request->title_heb;
        $category->name_en= $request->title_en;
        $category->status= $request->status;
        $category->icon= $request->icon;
        $category->type_id= $request->type_id;

        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            $fileFinalName = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        $category->photo= $fileFinalName;
        $category->save();
//        dd();
        return redirect()->route('edit.category',$category->id)->with('message',  trans("backLang.addDone"));
//        return view('backEnd.categories.edit_gategory',compact('GeneralWebmasterSections'));

    }


    //delete_categories
    public function delete_categories($id){
        $category=  category::find($id);
        $category->delete();
//        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return redirect()->route('categories')->with('message',  trans("backLang.deleteDone"));


    }

}
