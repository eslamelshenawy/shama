@extends('backEnd.layout')

@section('content')

    <div id="content" class="app-content box-shadow-z0" role="main">
        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                <div class="box-header dker">
                    <h3><i class="material-icons"></i>{{ trans('backLang.create_products') }}</h3>
                    <small>
                        <a href="{{url("admin")}}">{{ trans('backLang.home') }}</a> /
                        <a href="{{url('promo/codes/')}}">{{ trans('backLang.promo_code') }}</a> /
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
                    <form method="POST" action="{{url("promo/codes/store")}}" accept-charset="UTF-8"
                          enctype="multipart/form-data"><input name="_token" type="hidden"
                                                               value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.Categories') }} </label>
                            <div class="col-sm-10">
                                <select name="category_id" id="category_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.Categories') }}</option>
                                    @foreach(\App\category::where('status','!=','0')->get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->name_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name_heb}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="section_id"
                                   class="col-sm-2 form-control-label"> {{trans('backLang.subcategory_products') }} </label>
                            <div class="col-sm-10">
                                <select name="subcate_id" id="section_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.subcategory_products') }}</option>
                                    @foreach(\App\subcategory::where('status','!=','0')->get()  as $type )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$type->id}}">{{$type->name_en}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name_heb}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="father_id"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.select_product') }} </label>
                            <div class="col-sm-10">
                                <select name="product_id" id="product_id" class="form-control c-select">
                                    <option value="0">{{ trans('backLang.select_product') }}</option>
                                    @foreach(\App\product::where('status','!=','0')->get()  as $product )
                                        @if(App::getLocale()  == 'en')
                                            <option value="{{$product->id}}">{{$product->name_en}}</option>
                                        @else
                                            <option value="{{$product->id}}">{{$product->name_heb}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_heb"
                                   class="col-sm-2 form-control-label">
                                <small>{{ trans('backLang.promo_code') }}</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="title_heb" required="" dir="rtl"
                                       name="title_heb" type="text" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 form-control-label">{{ trans('backLang.amount') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="amount" required="" dir="ltr"
                                       name="amount"
                                       min="0" type="number" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 form-control-label">{{ trans('backLang.statdate') }}
                            </label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="input-group date" ui-jp="datetimepicker" ui-options="{
                                        format: 'YYYY-MM-DD',
                                        icons: {
                                          time: 'fa fa-clock-o',
                                          date: 'fa fa-calendar',
                                          up: 'fa fa-chevron-up',
                                          down: 'fa fa-chevron-down',
                                          previous: 'fa fa-chevron-left',
                                          next: 'fa fa-chevron-right',
                                          today: 'fa fa-screenshot',
                                          clear: 'fa fa-trash',
                                          close: 'fa fa-remove'
                                        }
                                      }">
                                        <input placeholder="" class="form-control has-value" id="date_end_price"
                                               required=""
                                               name="statdate" type="text" value="2019-07-08">
                                        <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 form-control-label">{{ trans('backLang.enddate') }}
                            </label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="input-group date" ui-jp="datetimepicker" ui-options="{
                                        format: 'YYYY-MM-DD',
                                        icons: {
                                          time: 'fa fa-clock-o',
                                          date: 'fa fa-calendar',
                                          up: 'fa fa-chevron-up',
                                          down: 'fa fa-chevron-down',
                                          previous: 'fa fa-chevron-left',
                                          next: 'fa fa-chevron-right',
                                          today: 'fa fa-screenshot',
                                          clear: 'fa fa-trash',
                                          close: 'fa fa-remove'
                                        }
                                      }">
                                        <input placeholder="" class="form-control has-value" id="enddate" required=""
                                               name="enddate" type="text" value="2019-07-08">
                                        <span class="input-group-addon">
                                          <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details_en"
                                   class="col-sm-2 form-control-label">{!!  trans('backLang.bannerDetails') !!}
                                @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status"))@endif
                            </label>
                            <div class="col-sm-10">
                                <div class="box p-a-xs">
                                    {!! Form::textarea('details',null, array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control summernote', 'dir'=>trans('backLang.ltr'),'ui-options'=>'{height: 300}')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link_status"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.status') }}</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        <input id="status1" class="has-value" checked="checked" name="status"
                                               type="radio" value="1">
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
                        <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                        </i> {{ trans('backLang.add') }}</button>
                                <a href="http://127.0.0.1:8000/12/sections" class="btn btn-default m-t"><i
                                            class="material-icons">
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
