@extends('backEnd.layout')
@section('headerInclude')
    <link rel="stylesheet" type="text/css" href="{{ URL::to("backEnd/assets/styles/flags.css") }}"/>
@endsection
@section('content')
    <div class="padding p-b-0">
        <div class="margin">
            <h5 class="m-b-0 _300">{{ trans('backLang.hi') }} <span class="text-primary">{{ Auth::user()->name }}</span>, {{ trans('backLang.welcomeBack') }}
            </h5>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <div class="row">
                    <?php
                    $data_sections_arr = explode(",", Auth::user()->permissionsGroup->data_sections);
                    $clr_ary = array("info", "danger", "success", "accent",);
                    $ik = 0;
                    ?>
                    @foreach($GeneralWebmasterSections as $headerWebmasterSection)
                        @if(in_array($headerWebmasterSection->id,$data_sections_arr))
                            @if($ik<4)
                                <?php
                                $LiIcon = "&#xe2c8;";
                                if ($headerWebmasterSection->type == 3) {
                                    $LiIcon = "&#xe050;";
                                }
                                if ($headerWebmasterSection->type == 2) {
                                    $LiIcon = "&#xe63a;";
                                }
                                if ($headerWebmasterSection->type == 1) {
                                    $LiIcon = "&#xe251;";
                                }
                                if ($headerWebmasterSection->type == 0) {
                                    $LiIcon = "&#xe2c8;";
                                }
                                if ($headerWebmasterSection->name == "sitePages") {
                                    $LiIcon = "&#xe3e8;";
                                }
                                if ($headerWebmasterSection->name == "articles") {
                                    $LiIcon = "&#xe02f;";
                                }
                                if ($headerWebmasterSection->name == "services") {
                                    $LiIcon = "&#xe540;";
                                }
                                if ($headerWebmasterSection->name == "news") {
                                    $LiIcon = "&#xe307;";
                                }
                                if ($headerWebmasterSection->name == "products") {
                                    $LiIcon = "&#xe8f6;";
                                }

                                ?>
{{--                                <div class="col-xs-6">--}}
{{--                                    <div class="box p-a" style="cursor: pointer"--}}
{{--                                         onclick="location.href='{{ route('topics',$headerWebmasterSection->id) }}'">--}}
{{--                                        <a href="{{ route('topics',$headerWebmasterSection->id) }}">--}}
{{--                                            <div class="pull-left m-r">--}}
{{--                                                <i class="material-icons  text-2x text-{{$clr_ary[$ik]}} m-y-sm">{!! $LiIcon !!}</i>--}}
{{--                                            </div>--}}
{{--                                            <div class="clear">--}}
{{--                                                <div class="text-muted">{{ trans('backLang.'.$headerWebmasterSection->name) }}</div>--}}
{{--                                                <h4 class="m-a-0 text-md _600">{{ $headerWebmasterSection->topics->count() }}</h4>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <?php
                                $ik++
                                ?>
                            @endif
                        @endif
                    @endforeach
{{--                    <div class="col-xs-12">--}}
{{--                        <div class="row-col box-color text-center primary">--}}
{{--                            <div class="row-cell p-a">--}}
{{--                                {{ trans('backLang.visitors') }}--}}
{{--                                <h4 class="m-a-0 text-md _600"><a href>{{$TodayVisitors}}</a></h4>--}}
{{--                            </div>--}}
{{--                            <div class="row-cell p-a dker">--}}
{{--                                {{ trans('backLang.pageViews') }}--}}
{{--                                <h4 class="m-a-0 text-md _600"><a href>{{$TodayPages}}</a></h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection
