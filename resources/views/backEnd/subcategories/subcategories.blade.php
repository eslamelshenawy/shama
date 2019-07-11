@extends('backEnd.layout')

@section('content')



    <div ui-view="" class="app-body" id="view">

        <!-- ############ PAGE START-->
        <div class="padding">
            <div class="box">
                <div class="box-header dker">
                    <h3>{{ trans('backLang.category_products') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a> {{ trans('backLang.subcategory_products') }}</a>
                    </small>
                </div>
                <div class="row p-a">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{url('create/subcategory')}}">
                            <i class="material-icons"></i>
                            &nbsp; {{ trans('backLang.create_sub_category_products') }}</a>
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
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>
                                        <a href="http://127.0.0.1:8000/12/sections/destroy/4" class="btn danger p-x-md">نعم</a>
                                    </div>
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
                                <th> {{ trans('backLang.name_subcategory') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcategory as $subcateg)

                                <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                        <input class="form-control row_no" name="row_ids[]" type="hidden" value="4">
                                    </label>
                                </td>
                                <td>
                                    <input class="form-control row_no" id="row_no" name="row_no_4" type="text" value="1">
                                    <i class="fa fa-amazon "></i>
                                    {{$subcateg->name_en}}</td>

                                {{--                                <td class="text-center">--}}
                                {{--                                    <i class="fa fa-check text-success inline"></i>--}}
                                {{--                                </td>--}}
                                <td class="text-center">
                                    <a class="btn btn-sm success" href="{{url('edit/subcategory')}}/{{$subcateg->id}}">
                                        <small><i class="material-icons"></i> {{ trans('backLang.update') }}
                                        </small>
                                    </a>
                                    <a href="{{url('delete/subcategory/')}}/{{$subcateg->id}}" class="btn btn-sm warning"  onclick="return confirm('Are you sure?')">
                                        {{ trans('backLang.delete') }}</a>


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
