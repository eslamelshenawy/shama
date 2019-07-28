@extends('backEnd.layout')

@section('content')





    <div id="content" class="app-content box-shadow-z0" role="main">
        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                <div class="box-header dker">
                    <h3><i class="material-icons"></i>{{ trans('backLang.create_Categories_Filters') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a href="{{url('all/subcat/products')}}">{{ trans('backLang.subcategory_products') }}</a> /
                        <a href="{{url('all/subcat/products')}}"> {{ trans('backLang.subcategory_products') }}</a>
                    </small>
                </div>
                <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="nav-link" href="#">
                                <i class="material-icons md-18">×</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="box-body">
                    <form method="POST" action="{{url('store/subcategory')}}" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" type="hidden" value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.Categories') }} </label>
                            <div class="col-sm-10">
                                <select name="section_id" id="section_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.Categories') }}</option>
                                    @foreach(\App\category::get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->name_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name_heb}}</option>
                                        @endif                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_id" class="col-sm-2 form-control-label"> {{ trans('backLang.select_type') }} </label>
                            <div class="col-sm-10">
                                <select name="type_id" id="type_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.select_type') }}</option>
                                    @foreach(\App\Topic::where('webmaster_id',13)->get()  as $type )

                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->title_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->title_il}}</option>
                                        @endif                                   

                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="title_heb" class="col-sm-2 form-control-label"> {{ trans('backLang.sectionName') }}
                                <small>[{{ trans('backLang.hebrew') }}]</small>                        </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="title_heb" required="" dir="rtl" name="title_heb" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_en" class="col-sm-2 form-control-label">{{ trans('backLang.sectionName') }}
                                <small>[ {{ trans('backLang.english') }} ]</small>                        </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="title_en" required="" dir="ltr" name="title_en" type="text" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link_status" class="col-sm-2 form-control-label">{{ trans('backLang.status') }}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        <input id="status1" class="has-value" checked="checked" name="status" type="radio" value="1">
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        <input id="status2" class="has-value" name="status" type="radio" value="0">
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.notActive') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-sm-2 form-control-label"> {{ trans('backLang.bannerPhoto') }}</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="photo" accept="image/*" name="photo" type="file">
                            </div>
                        </div>
                        <div class="form-group row m-t-md" style="margin-top: 0 !important;">
                            <div class="col-sm-offset-2 col-sm-10">
                                <small>
                                    <i class="material-icons"></i>
                                    {{ trans('backLang.imagesTypes') }}
                                </small>
                            </div>
                        </div>
                        <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                        </i> {{ trans('backLang.add') }}</button>
                                <a href="http://127.0.0.1:8000/12/sections" class="btn btn-default m-t"><i class="material-icons">
                                        </i> {{ trans('backLang.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ############ PAGE END-->

    </div>
    </div>





@endsection
