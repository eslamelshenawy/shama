@extends('backEnd.layout')

@section('content')
{{--{{dd($setting_filter)}}--}}
    <div class="padding">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form method="POST" action="{{url('filter/setting/store')}}" accept-charset="UTF-8">
            {{csrf_field()}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        <h5>
                            <i class="material-icons"></i>
                            {{ trans('backLang.Active_Filters') }}
                        </h5>
                    </label>
                    <hr>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input name="color" type="checkbox" value="{{$setting_filter->color ? $setting_filter->color : 1}}"
                                {{  $setting_filter->color ==1  ? "checked" : ""}} >
                        <i class="dark-white"></i><label for="color">{{ trans('backLang.color') }}</label>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input name="filters_standard" type="checkbox" {{  $setting_filter->filters_standard ==1  ? "checked" : ""}} value="{{$setting_filter->filters_standard ? $setting_filter->filters_standard : 1 }}">
                        <i class="dark-white"></i><label
                                for="filters_standard">{{ trans('backLang.filters_standard') }}</label>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input name="style" type="checkbox" {{  $setting_filter->style ==1  ? "checked" : ""}}
                               value="{{$setting_filter->style ? $setting_filter->style : 1}}">
                        <i class="dark-white"></i><label for="style">{{ trans('backLang.style') }}</label>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input name="natural" type="checkbox" {{  $setting_filter->natural ==1  ? "checked" : ""}}
                               value="{{$setting_filter->natural ? $setting_filter->natural : 1}}">
                        <i class="dark-white"></i><label for="natural">{{ trans('backLang.natural') }}</label>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input  name="seller" type="checkbox" {{  $setting_filter->seller ==1  ? "checked" : ""}} value="{{$setting_filter->seller ? $setting_filter->seller : 1}}">
                        <i class="dark-white"></i><label for="seller">{{ trans('backLang.seller') }}</label>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="ui-check">
                        <input  name="men_women" type="checkbox" {{  $setting_filter->men_women ==1  ? "checked" : ""}} value="{{$setting_filter->men_women ? $setting_filter->men_women : 1}}">
                        <i class="dark-white"></i><label for="men_women">{{ trans('backLang.men_women') }}</label>
                    </label>
                </div>
                <br>
            </div>
            <div class="form-group row m-t-md">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary m-t">
                        <i class="material-icons">
                            </i> {{ trans('backLang.add') }}
                    </button>
                </div>
            </div>


        </form>
        <div class="row">
            <br>
        </div>
    </div>

@endsection
