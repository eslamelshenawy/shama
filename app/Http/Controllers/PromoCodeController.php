<?php

namespace App\Http\Controllers;

use App\setting_filter;
use App\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;
use App\category;
use App\subcategory;
use App\product;
use App\PromoCode;

class PromoCodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

//
    public function index(){
        $promo_code=  PromoCode::where('status', '=', '1')->get();
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.promocodes.index',compact('promo_code','GeneralWebmasterSections'));

    }


//
    public function create(){
        $setting_filter = setting_filter::find(1);

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.promocodes.create',compact('GeneralWebmasterSections','setting_filter'));

    }

    public function store(Request $request){
//        dd($request->all());
        $promo_code= new PromoCode;
        $promo_code->category_id= $request->category_id ;
        $promo_code->subcategory_id= $request->subcate_id ;
        $promo_code->product_id= $request->product_id ;
        $promo_code->code= $request->code ;
        $promo_code->details= $request->details ;
        $promo_code->amount= $request->amount ;
        $promo_code->start_date= $request->statdate ;
        $promo_code->end_date= $request->enddate ;
        $promo_code->status= $request->status ;
        $promo_code->save();

        return redirect()->route('promo.code.edit',$promo_code->id)->with('message',  trans("backLang.saveDone"));


    }


    public function edit($id){
        $promo_code = PromoCode::find($id);

        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.promocodes.edit',compact('GeneralWebmasterSections','promo_code'));

    }

    public function update(Request $request,$id){

        $promo_code = PromoCode::find($id);
        $promo_code->category_id= $request->category_id ;
        $promo_code->subcategory_id= $request->subcate_id ;
        $promo_code->product_id= $request->product_id ;
        $promo_code->code= $request->code ;
        $promo_code->details= $request->details ;
        $promo_code->amount= $request->amount ;
        $promo_code->start_date= $request->statdate ;
        $promo_code->end_date= $request->enddate ;
        $promo_code->status= $request->status ;
        $promo_code->save();

        return redirect()->route('promo.code.edit',$promo_code->id)->with('message',  trans("backLang.saveDone"));


    }

    //delete promo code
    public function delete($id){
        $category=  PromoCode::find($id);
        $category->delete();
        return redirect()->route('promo.code')->with('message',  trans("backLang.deleteDone"));


    }



}
