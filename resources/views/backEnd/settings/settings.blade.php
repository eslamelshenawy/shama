@extends('backEnd.layout')
@section('headerInclude')
    <link rel="stylesheet"
          href="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
          type="text/css"/>
@endsection
@section('content')
    <div class="padding">
        <div class="row-col">
            <div class="col-sm-3 col-lg-2">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link block {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                                   href data-toggle="tab" data-target="#tab-1"><i class="material-icons">&#xe30c;</i>
                                    &nbsp; {!!  trans('backLang.siteInfoSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{ ( Session::has('contactsTab') ? 'active' : '') }}" href
                                   data-toggle="tab" data-target="#tab-2"><i class="material-icons">&#xe0ba;</i>
                                    &nbsp; {!!  trans('backLang.siteContactsSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{ ( Session::has('socialTab') ? 'active' : '') }}" href
                                   data-toggle="tab" data-target="#tab-3"><i class="material-icons">&#xe80d;</i>
                                    &nbsp; {!!  trans('backLang.siteSocialSettings') !!}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block {{ ( Session::has('styleTab') ? 'active' : '') }}" href
                                   data-toggle="tab" data-target="#tab-5"><i class="material-icons">&#xe41d;</i>
                                    &nbsp; {!!  trans('backLang.styleSettings') !!}</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link block {{ ( Session::has('statusTab') ? 'active' : '') }}" href--}}
{{--                                   data-toggle="tab" data-target="#tab-4"><i class="material-icons">&#xe8c6;</i>--}}
{{--                                    &nbsp; {!!  trans('backLang.siteStatusSettings') !!}</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-lg-10 light lt">
                <div class="tab-content pos-rlt">
                    <div class="tab-pane {{ ((!Session::has('statusTab') && !Session::has('styleTab') && !Session::has('socialTab') && !Session::has('contactsTab')) ? 'active' : '') }}"
                         id="tab-1">
                        {{Form::open(['route'=>['settingsUpdateSiteInfo'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe30c;</i>
                            &nbsp; {!!  trans('backLang.siteInfoSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.websiteTitle') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                    </label>
                                    {!! Form::text('site_title_ar',$Setting->site_title_ar, array('placeholder' => trans('backLang.websiteTitle'),'class' => 'form-control', 'dir'=>trans('backLang.rtl'))) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.websiteTitle') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                    </label>
                                    {!! Form::text('site_title_en',$Setting->site_title_en, array('placeholder' => trans('backLang.websiteTitle'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.metaDescription') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                    </label>
                                    {!! Form::textarea('site_desc_ar',$Setting->site_desc_ar, array('placeholder' => trans('backLang.metaDescription'),'class' => 'form-control', 'dir'=>trans('backLang.rtl'),'rows'=>'2')) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.metaDescription') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                    </label>
                                    {!! Form::textarea('site_desc_en',$Setting->site_desc_en, array('placeholder' => trans('backLang.metaDescription'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'),'rows'=>'2')) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.metaKeywords') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                    </label>
                                    {!! Form::textarea('site_keywords_ar',$Setting->site_keywords_ar, array('placeholder' => trans('backLang.metaKeywords'),'class' => 'form-control', 'dir'=>trans('backLang.rtl'),'rows'=>'2')) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.metaKeywords') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                    </label>
                                    {!! Form::textarea('site_keywords_en',$Setting->site_keywords_en, array('placeholder' => trans('backLang.metaKeywords'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'),'rows'=>'2')) !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>{!!  trans('backLang.websiteUrl') !!}</label>
                                {!! Form::text('site_url',$Setting->site_url, array('placeholder' => 'http//:www.sitename.com/','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <br>
{{--                            <h6>{!!  trans('backLang.emailNotifications') !!}</h6>--}}
{{--                            <hr>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{!!  trans('backLang.websiteNotificationEmail') !!}</label>--}}
{{--                                {!! Form::text('site_webmails',$Setting->site_webmails, array('placeholder' => 'email@sitename.com','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ trans('backLang.websiteNotificationEmail1') }} : </label>--}}
{{--                                <div class="radio">--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_messages_status','1',$Setting->notify_messages_status ? true : false , array('id' => 'seo_status1','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.yes') }}--}}
{{--                                    </label>--}}
{{--                                    &nbsp; &nbsp;--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_messages_status','0',$Setting->notify_messages_status ? false : true , array('id' => 'seo_status2','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.no') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ trans('backLang.websiteNotificationEmail2') }} : </label>--}}
{{--                                <div class="radio">--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_comments_status','1',$Setting->notify_comments_status ? true : false , array('id' => 'seo_status1','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.yes') }}--}}
{{--                                    </label>--}}
{{--                                    &nbsp; &nbsp;--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_comments_status','0',$Setting->notify_comments_status ? false : true , array('id' => 'seo_status2','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.no') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>{{ trans('backLang.websiteNotificationEmail3') }} : </label>--}}
{{--                                <div class="radio">--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_orders_status','1',$Setting->notify_orders_status ? true : false , array('id' => 'seo_status1','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.yes') }}--}}
{{--                                    </label>--}}
{{--                                    &nbsp; &nbsp;--}}
{{--                                    <label class="ui-check ui-check-md">--}}
{{--                                        {!! Form::radio('notify_orders_status','0',$Setting->notify_orders_status ? false : true , array('id' => 'seo_status2','class'=>'has-value')) !!}--}}
{{--                                        <i class="dark-white"></i>--}}
{{--                                        {{ trans('backLang.no') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane {{ ( Session::has('contactsTab') ? 'active' : '') }}" id="tab-2">
                        {{Form::open(['route'=>['settingsUpdateContacts'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe0ba;</i>
                            &nbsp; {!!  trans('backLang.siteContactsSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.contactAddress') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                    </label>
                                    {!! Form::text('contact_t1_ar',$Setting->contact_t1_ar, array('placeholder' => trans('backLang.contactAddress'),'class' => 'form-control', 'dir'=>trans('backLang.rtl'))) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.contactAddress') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                    </label>
                                    {!! Form::text('contact_t1_en',$Setting->contact_t1_en, array('placeholder' => trans('backLang.contactAddress'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>{!!  trans('backLang.contactPhone') !!}</label>
                                {!! Form::text('contact_t3',$Setting->contact_t3, array('placeholder' => trans('backLang.contactPhone'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.contactFax') !!}</label>
                                {!! Form::text('contact_t4',$Setting->contact_t4, array('placeholder' => trans('backLang.contactFax'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.contactMobile') !!}</label>
                                {!! Form::text('contact_t5',$Setting->contact_t5, array('placeholder' => trans('backLang.contactMobile'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            <div class="form-group">
                                <label>{!!  trans('backLang.contactEmail') !!}</label>
                                {!! Form::text('contact_t6',$Setting->contact_t6, array('placeholder' => trans('backLang.contactEmail'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>
                            @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.worksTime') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif
                                    </label>
                                    {!! Form::text('contact_t7_ar',$Setting->contact_t7_ar, array('placeholder' => trans('backLang.worksTime'),'class' => 'form-control', 'dir'=>trans('backLang.rtl'))) !!}
                                </div>
                            @endif
                            @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                <div class="form-group">
                                    <label>{!!  trans('backLang.worksTime') !!}
                                        @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif
                                    </label>
                                    {!! Form::text('contact_t7_en',$Setting->contact_t7_en, array('placeholder' => trans('backLang.worksTime'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                                </div>
                            @endif
                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane {{ ( Session::has('socialTab') ? 'active' : '') }}" id="tab-3">
                        {{Form::open(['route'=>['settingsUpdateSocialLinks'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe80d;</i>
                            &nbsp; {!!  trans('backLang.siteSocialSettings') !!}</div>
                        <div class="p-a-md col-md-12">

                            <div class="form-group">
                                <label><i class="fa fa-facebook"></i> &nbsp; {!!  trans('backLang.facebook') !!}</label>
                                {!! Form::text('social_link1',$Setting->social_link1, array('placeholder' => trans('backLang.facebook'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-twitter"></i> &nbsp; {!!  trans('backLang.twitter') !!}</label>
                                {!! Form::text('social_link2',$Setting->social_link2, array('placeholder' => trans('backLang.twitter'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-google-plus"></i> &nbsp; {!!  trans('backLang.google') !!}
                                </label>
                                {!! Form::text('social_link3',$Setting->social_link3, array('placeholder' => trans('backLang.google'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-linkedin"></i> &nbsp; {!!  trans('backLang.linkedin') !!}</label>
                                {!! Form::text('social_link4',$Setting->social_link4, array('placeholder' => trans('backLang.linkedin'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-youtube-play"></i> &nbsp; {!!  trans('backLang.youtube') !!}
                                </label>
                                {!! Form::text('social_link5',$Setting->social_link5, array('placeholder' => trans('backLang.youtube'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-instagram"></i> &nbsp; {!!  trans('backLang.instagram') !!}
                                </label>
                                {!! Form::text('social_link6',$Setting->social_link6, array('placeholder' => trans('backLang.instagram'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-pinterest"></i> &nbsp; {!!  trans('backLang.pinterest') !!}
                                </label>
                                {!! Form::text('social_link7',$Setting->social_link7, array('placeholder' => trans('backLang.pinterest'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-tumblr"></i> &nbsp; {!!  trans('backLang.tumblr') !!}</label>
                                {!! Form::text('social_link8',$Setting->social_link8, array('placeholder' => trans('backLang.tumblr'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-flickr"></i> &nbsp; {!!  trans('backLang.flickr') !!}</label>
                                {!! Form::text('social_link9',$Setting->social_link9, array('placeholder' => trans('backLang.flickr'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-whatsapp"></i> &nbsp; {!!  trans('backLang.whatapp') !!}</label>
                                {!! Form::text('social_link10',$Setting->social_link10, array('placeholder' => trans('backLang.whatapp'),'class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
                            </div>

                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="tab-pane {{ ( Session::has('statusTab') ? 'active' : '') }}" id="tab-4">
                        {{Form::open(['route'=>['settingsUpdateSiteStatus'],'method'=>'POST'])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe8c6;</i>
                            &nbsp; {!!  trans('backLang.siteStatusSettings') !!}</div>
                        <div class="p-a-md col-md-12">
                            <div class="form-group">
                                <label>{{ trans('backLang.siteStatusSettings') }} : </label>
                                <div class="radio">
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('site_status','1',$Setting->site_status ? true : false , array('id' => 'site_status1','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.active') }}
                                    </label>
                                    &nbsp; &nbsp;
                                    <label class="ui-check ui-check-md">
                                        {!! Form::radio('site_status','0',$Setting->site_status ? false : true , array('id' => 'site_status2','class'=>'has-value')) !!}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.notActive') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group"
                                 id="close_msg_div" {!!   ($Setting->site_status) ? "style='display:none'":"" !!}>
                                <label>{!!  trans('backLang.siteStatusSettingsMsg') !!} </label>
                                {!! Form::textarea('close_msg',$Setting->close_msg, array('placeholder' => trans('backLang.siteStatusSettingsMsg'),'class' => 'form-control','rows'=>'4')) !!}
                            </div>
                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>


                    <div class="tab-pane {{ ( Session::has('styleTab') ? 'active' : '') }}" id="tab-5">
                        {{Form::open(['route'=>['settingsUpdateSiteStyle'],'method'=>'POST', 'files' => true])}}
                        <div class="p-a-md dker _600"><i class="material-icons">&#xe41d;</i>
                            &nbsp; {!!  trans('backLang.styleSettings') !!}</div>
                        <div class="p-a-md col-md-12">

                            <div class="form-group row">
                                @if(Helper::GeneralWebmasterSettings("ar_box_status"))
                                    <div class="col-sm-6">
                                        <label for="style_logo_ar">{!!  trans('backLang.siteLogo') !!} @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.IsraelBox') !!}@endif</label>
                                        @if($Setting->style_logo_ar!="")
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 box p-a-xs text-center">
                                                        <a target="_blank"
                                                           href="{{ URL::to('uploads/settings/'.$Setting->style_logo_ar) }}"><img
                                                                    src="{{ URL::to('uploads/settings/'.$Setting->style_logo_ar) }}"
                                                                    class="img-responsive" id="style_logo_ar_prv"
                                                                    style="width: auto;max-width: 260px;max-height: 60px">
                                                            <br>
                                                            <small>{{ $Setting->style_logo_ar }}</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 box p-a-xs text-center">
                                                        <img
                                                                src="{{ URL::to('uploads/settings/nologo.png') }}"
                                                                class="img-responsive" id="style_logo_ar_prv"
                                                                style="width: auto;max-width: 260px;max-height: 60px">
                                                        <br>
                                                        <small>nologo.png</small>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {!! Form::file('style_logo_ar', array('class' => 'form-control','id'=>'style_logo_ar','accept'=>'image/*')) !!}
                                        <small>
                                            <i class="material-icons">&#xe8fd;</i>( 260x60 px ) -
                                            {!!  trans('backLang.imagesTypes') !!}
                                        </small>
                                    </div>
                                @endif
                                @if(Helper::GeneralWebmasterSettings("en_box_status"))
                                    <div class="col-sm-6">
                                        <label for="style_logo_en">{!!  trans('backLang.siteLogo') !!} @if(Helper::GeneralWebmasterSettings("ar_box_status") && Helper::GeneralWebmasterSettings("en_box_status")){!!  trans('backLang.englishBox') !!}@endif</label>
                                        @if($Setting->style_logo_en!="")
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 box p-a-xs text-center">
                                                        <a target="_blank"
                                                           href="{{ URL::to('uploads/settings/'.$Setting->style_logo_en) }}"><img
                                                                    src="{{ URL::to('uploads/settings/'.$Setting->style_logo_en) }}"
                                                                    class="img-responsive" id="style_logo_en_prv"
                                                                    style="width: auto;max-width: 260px;max-height: 60px">
                                                            <br>
                                                            <small>{{ $Setting->style_logo_en }}</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 box p-a-xs text-center">
                                                        <img
                                                                src="{{ URL::to('uploads/settings/nologo.png') }}"
                                                                class="img-responsive" id="style_logo_en_prv"
                                                                style="width: auto;max-width: 260px;max-height: 60px">
                                                        <br>
                                                        <small>nologo.png</small>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {!! Form::file('style_logo_en', array('class' => 'form-control','id'=>'style_logo_en','accept'=>'image/*')) !!}
                                        <small>
                                            <i class="material-icons">&#xe8fd;</i>( 260x60 px ) -
                                            {!!  trans('backLang.imagesTypes') !!}
                                        </small>
                                    </div>
                                @endif

                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="style_fav">{!!  trans('backLang.favicon') !!}</label>
                                    @if($Setting->style_fav!="")
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12 box p-a-xs text-center">
                                                    <a target="_blank"
                                                       href="{{ URL::to('uploads/settings/'.$Setting->style_fav) }}"><img
                                                                src="{{ URL::to('uploads/settings/'.$Setting->style_fav) }}"
                                                                class="img-responsive" id="style_fav_prv"
                                                                style="max-width: 60px;height: 60px">
                                                        <br>
                                                        <small>{{ $Setting->style_fav }}</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12 box p-a-xs text-center">
                                                    <a target="_blank"
                                                       href="{{ URL::to('uploads/settings/nofav.png') }}"><img
                                                                src="{{ URL::to('uploads/settings/nofav.png') }}"
                                                                class="img-responsive" id="style_fav_prv"
                                                                style="max-width: 60px;height: 60px">
                                                        <br>
                                                        <small>nofav.png</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {!! Form::file('style_fav', array('class' => 'form-control','id'=>'style_fav','accept'=>'image/*')) !!}
                                    <small>
                                        <i class="material-icons">&#xe8fd;</i> ( 32x32 px ) -
                                        {!!  trans('backLang.imagesTypes') !!}
                                    </small>
                                </div>
                                <div class="col-sm-6">
                                    <label for="style_apple">{!!  trans('backLang.appleIcon') !!}</label>
                                    @if($Setting->style_apple!="")
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12 box p-a-xs text-center">
                                                    <a target="_blank"
                                                       href="{{ URL::to('uploads/settings/'.$Setting->style_apple) }}"><img
                                                                src="{{ URL::to('uploads/settings/'.$Setting->style_apple) }}"
                                                                class="img-responsive" id="style_apple_prv" style="width: 60px;height: 60px">
                                                        <br>
                                                        <small>{{ $Setting->style_apple }}</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12 box p-a-xs text-center">
                                                    <a target="_blank"
                                                       href="{{ URL::to('uploads/settings/nofav.png') }}"><img
                                                                src="{{ URL::to('uploads/settings/nofav.png') }}"
                                                                class="img-responsive" id="style_apple_prv"
                                                                style="max-width: 60px;height: 60px">
                                                        <br>
                                                        <small>nofav.png</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {!! Form::file('style_apple', array('class' => 'form-control','id'=>'style_apple','accept'=>'image/*')) !!}
                                    <small>
                                        <i class="material-icons">&#xe8fd;</i> ( 180x180 px ) -
                                        {!!  trans('backLang.imagesTypes') !!}
                                    </small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info m-t">{{ trans('backLang.update') }}</button>
                        </div>
                        {{Form::close()}}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('footerInclude')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#site_status1").click(function () {
                $("#close_msg_div").css("display", "none");
            });
            $("#site_status2").click(function () {
                $("#close_msg_div").css("display", "block");
            });

            $("#style_type1").click(function () {
                $("#bgtyps").css("display", "none");
            });
            $("#style_type2").click(function () {
                $("#bgtyps").css("display", "inline-block");
            });

            $("#style_bg_type1").click(function () {
                $("#bgtimg").css("display", "none");
                $("#bgtptr").css("display", "none");
                $("#bgtclr").css("display", "inline-block");
            });
            $("#style_bg_type2").click(function () {
                $("#bgtimg").css("display", "none");
                $("#bgtclr").css("display", "none");
                $("#bgtptr").css("display", "inline-block");
            });
            $("#style_bg_type3").click(function () {
                $("#bgtptr").css("display", "none");
                $("#bgtclr").css("display", "none");
                $("#bgtimg").css("display", "inline-block");
            });
        });

    </script>
    <script src="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(function () {
            $('#cp1').colorpicker({
                colorSelectors: {
                    'black': '#000000',
                    'white': '#ffffff',
                    'red': '#FF0000',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                }
            });
            $('#cp2').colorpicker({
                colorSelectors: {
                    'black': '#000000',
                    'white': '#ffffff',
                    'red': '#FF0000',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                }
            });
            $('#cp3').colorpicker({
                colorSelectors: {
                    'black': '#000000',
                    'white': '#ffffff',
                    'red': '#FF0000',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                }
            });
        });
        function update_restcolor() {
            document.getElementById("style_color1").value = '#0cbaa4';
            $("#cpbg i").css("background-color", "#0cbaa4");
        }

        function update_restcolor2() {
            document.getElementById("style_color2").value = '#2e3e4e';
            $("#cpbg2 i").css("background-color", "#2e3e4e");
        }
    </script>
    <script type="text/javascript">
        function readURL(input,prv) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+prv).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#style_logo_ar").change(function () {
            readURL(this, "style_logo_ar_prv");
        });

        $("#style_logo_en").change(function () {
            readURL(this, "style_logo_en_prv");
        });

        $("#style_fav").change(function () {
            readURL(this, "style_fav_prv");
        });

        $("#style_apple").change(function () {
            readURL(this, "style_apple_prv");
        });
    </script>
@endsection

