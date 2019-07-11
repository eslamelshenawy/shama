@extends('backEnd.layout')

@section('content')

    <div ui-view="" class="app-body" id="view">

        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                <div class="box-header dker">
                    <h3><i class="material-icons"></i>{{ trans('backLang.filters') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a href="{{url('filter/color')}}">{{ trans('backLang.color') }}</a> /
                        <a> {{ trans('backLang.color') }}</a>
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
                    <form method="POST" action="http://127.0.0.1:8000/12/sections/store" accept-charset="UTF-8"
                          enctype="multipart/form-data"><input name="_token" type="hidden"
                                                               value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn"
                                                               class="has-value">

                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="title_ar"
                                   class="col-sm-2 form-control-label"> {{ trans('backLang.sectionName') }}
                                <small>[{{ trans('backLang.hebrew') }}]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="title_ar"  dir="rtl"
                                       name="title_ar" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_en"
                                   class="col-sm-2 form-control-label">{{ trans('backLang.sectionName') }}
                                <small>[ {{ trans('backLang.english') }} ]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="title_en"  dir="ltr"
                                       name="title_en" type="text" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="spcialprice" class="col-sm-2 form-control-label">{{ trans('backLang.weight') }}
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control" id="spcialprice"
                                       name="weight" value="" min="0" type="number">
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


@endsection
