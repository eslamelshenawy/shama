@extends('backEnd.layout')

@section('content')




    <div id="content" class="app-content box-shadow-z0" role="main">
        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="box-header dker">
                    <h3><i class="material-icons"></i>{{ trans('backLang.category_products') }}</h3>
                    <small>
                        <a href="http://127.0.0.1:8000/admin">{{ trans('backLang.home') }}</a> /
                        <a>{{ trans('backLang.category_products') }}</a> /
                        <a> {{ trans('backLang.hasCategories') }}</a>
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

                    <form method="POST" action="{{url('/store/edit/category')}}/{{$category->id}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="title_heb" class="col-sm-2 form-control-label"> {{ trans('backLang.sectionName') }}
                                <small>[{{ trans('backLang.hebrew') }}]</small>
                            </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control"
                                       id="title_heb" required="" dir="rtl" name="title_heb"
                                       type="text" value="{{$category->name_heb}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title_en" class="col-sm-2 form-control-label">{{ trans('backLang.sectionName') }}
                                <small>[ {{ trans('backLang.english') }} ]</small>                        </label>
                            <div class="col-sm-10">
                                <input placeholder="" class="form-control"
                                       id="title_en" required="" dir="ltr"
                                       name="title_en" type="text" value="{{$category->name_en}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_file" class="col-sm-2 form-control-label">صورة</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="topic_photo" class="col-sm-4 box p-a-xs">
                                            <a target="_blank" href="{{url('/uploads/topics')}}/{{$category->photo}}">
                                                <img src="{{url('/uploads/topics')}}/{{$category->photo}}" class="img-responsive">
                                                15619826741352.jpg
                                            </a>
                                            <br>
                                            <a
                                                    onclick="document.getElementById('topic_photo').style.display='none';document.getElementById('photo_delete').value='1';document.getElementById('undo').style.display='block';"
                                                    class="btn btn-sm btn-default">حذف</a>
                                        </div>
                                        <div id="undo" class="col-sm-4 p-a-xs" style="display: none">
                                            <a onclick="document.getElementById('topic_photo').style.display='block';document.getElementById('photo_delete').value='0';document.getElementById('undo').style.display='none';">
                                                <i class="material-icons">
                                                    </i> تراجع عن الحذف</a>
                                        </div>

                                        <input id="photo_delete" name="photo_delete" type="hidden" value="0" class="has-value">
                                    </div>
                                </div>

                                <input class="form-control" id="photo_file"
                                       accept="image/*" name="photo" type="file">

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
                        <div class="form-group row m-t-md">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                        </i> {{ trans('backLang.update') }}</button>
                                <a href="{{url('edit/category')}}/{{$category->id}}" class="btn btn-default m-t"><i class="material-icons">
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
