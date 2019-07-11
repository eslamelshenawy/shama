<?php

namespace App\Http\Controllers;

use App\WebmasterSection;
use App\setting_filter;
use Illuminate\Http\Request;

class filtersController extends Controller
{
    //
    public function index(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.filters.filters',compact('GeneralWebmasterSections'));
    }

  //create color
    public function color(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.filters.color',compact('GeneralWebmasterSections'));
    }
 //create weight
    public function weight(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
        return view('backEnd.filters.weight',compact('GeneralWebmasterSections'));
    }


 public function index_sub(){
     $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

     return view('backEnd.subfilter.subfilter',compact('GeneralWebmasterSections'));
    }

    //
    public function create(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.filters.create',compact('GeneralWebmasterSections'));
    }
    public function create_sub(){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();

        return view('backEnd.subfilter.create_sub',compact('GeneralWebmasterSections'));
    }

    public function setting(Request $request ){
        $GeneralWebmasterSections = WebmasterSection::where('status', '=', '1')->orderby('row_no', 'asc')->get();
            $setting_filter = setting_filter::find(1);
        return view('backEnd.filters.setting',compact('GeneralWebmasterSections','setting_filter'));
    }


    public function setting_store(Request $request ){
        $setting_filter = setting_filter::find(1);
        $setting_filter->color= $request->color;
        $setting_filter->filters_standard= $request->filters_standard;
        $setting_filter->style= $request->style;
        $setting_filter->natural= $request->natural;
        $setting_filter->seller= $request->seller;
        $setting_filter->men_women= $request->men_women;
        $setting_filter->save();
//        dd($setting_filter);
       return redirect()->route('filters.setting')->with('message',  trans("backLang.saveDone"),compact('setting_filter'));

    }
}
