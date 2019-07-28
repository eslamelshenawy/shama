@extends('backEnd.layout')

@section('content')



    <div ui-view="" class="app-body" id="view">

        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="box-header dker">
                    <h3>{{ trans('backLang.category_products') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a>Filters</a> /
                        <a> {{ trans('backLang.category_products') }}</a>
                    </small>
                </div>
                <div class="row p-a">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{url('create/category')}}">
                            <i class="material-icons"></i>
                            &nbsp; {{ trans('backLang.create_category_products') }}</a>
                    </div>
                </div>

                <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="hkdPcdkpLFBcnEINBm1cG9yPzgALyqhtZSm4cHRn">
                    <div class="table-responsive">
                        <div id="m-4" class="modal fade" data-backdrop="true">
                            <div class="modal-dialog" id="animate">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">تأكيد</h5>
                                    </div>
                                    <div class="modal-body text-center p-lg">
                                        <p>
                                            هل أنت متأكد أنك تريد الحذف بالفعل؟
                                            <br>
                                            <strong>[ DESIGN YOUR OWN ENGAGEMENT RING ]</strong>
                                        </p>
                                    </div>
                                    @foreach($category as $categor)

                                    <div class="modal-footer">
                                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>
                                        <a href="{{url('delete/category/')}}/{{$categor->id}}" class="btn danger p-x-md">نعم</a>
                                    </div>
                                    @endforeach

                                </div><!-- /.modal-content -->
                            </div>
                        </div><table class="table table-striped  b-t">
                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="ui-check m-a-0">
                                        <input id="checkAll" type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th> {{ trans('backLang.name_category') }}</th>
                               <th class="text-center" style="width:50px;">{{ trans('backLang.status') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $categor)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                        <input class="form-control row_no" name="row_ids[]" type="hidden" value="4">
                                    </label>
                                </td>
                                
                                     <td>
                                    <input class="form-control row_no" id="row_no" name="row_no_4" type="text" value="1">
                                    <i class="fa fa-amazon "></i>
                                    {{$categor->name_en}}
                                    </td>
                                    
                                      <td class="text-center">
                                    <i class="fa {{ ($categor->status==1) ? "fa-check text-success":"fa-times text-danger" }} inline"></i>
                                      </td>
                                <td class="text-center">
                                    <a class="btn btn-sm success" href="{{url('edit/category')}}/{{$categor->id}}">
                                        <small><i class="material-icons"></i> {{ trans('backLang.update') }}
                                        </small>
                                    </a>
                                    <a href="{{url('delete/category/')}}/{{$categor->id}}" class="btn btn-sm warning"  onclick="return confirm('Are you sure?')">
                                        {{ trans('backLang.delete') }}</a>
{{--                                    <button class="btn btn-sm warning" data-toggle="modal" data-target="#m-4" ui-toggle-class="bounce" ui-target="#animate">--}}
{{--                                        <small><i class="material-icons"></i> {{ trans('backLang.delete') }}--}}
{{--                                        </small>--}}
{{--                                    </button>--}}

                                </td>
                            </tr>
                            @endforeach
                            <!-- .modal -->

                            <!-- / .modal -->



                            </tbody>
                        </table>

                    </div>
                    <footer class="dker p-a">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <!-- .modal -->
                                <div id="m-all" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog" id="animate">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تأكيد</h5>
                                            </div>
                                            <div class="modal-body text-center p-lg">
                                                <p>
                                                    هل أنت متأكد أنك تريد الحذف بالفعل؟
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>
                                                <button type="submit" class="btn danger p-x-md">نعم</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                                <!-- / .modal -->

                            </div>


                            <div class="col-sm-6 text-right text-center-xs">

                            </div>
                        </div>
                    </footer>
                </form>

            </div>
        </div>
        <!-- ############ PAGE END-->

    </div>



@endsection
