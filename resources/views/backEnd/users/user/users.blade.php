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
                    <h3>{{ trans('backLang.create_users') }}</h3>
                    <small>
                        <a href="{{url('admin')}}">{{ trans('backLang.home') }}</a> /
                        <a> {{ trans('backLang.create_users') }}</a>
                    </small>
                </div>
                <div class="row p-a">
                    <div class="col-sm-12">
                        <a class="btn btn-fw primary" href="{{url('users/create/')}}">
                            <i class="material-icons"></i>
                            &nbsp; {{ trans('backLang.create_users') }}</a>
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
                                    @foreach($Users as $user)

                                    <div class="modal-footer">
                                        <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">لا</button>
                                        <a href="{{url('users/delete')}}/{{$user->id}}" class="btn danger p-x-md">نعم</a>
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
                                <th class="text-center" style="width:200px;">{{ trans('backLang.options') }}</th>
                                <th class="text-center" style="width:200px;">{{ trans('backLang.view') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Users as $user)
                            <tr>
                                <td><label class="ui-check m-a-0">
                                        <input type="checkbox" name="ids[]" value="4"><i class="dark-white"></i>
                                        <input class="form-control row_no" name="row_ids[]" type="hidden" value="4">
                                    </label>
                                </td>
                                <td>
                                    <input class="form-control row_no" id="row_no" name="row_no_4" type="text" value="1">
                                    <i class="fa fa-amazon "></i>
                                    {{$user->name}}</td>

                                <td class="text-center">
                                    <a class="btn btn-sm success" href="{{url('users')}}/{{$user->id}}/edit">
                                        <small><i class="material-icons"></i> {{ trans('backLang.update') }}
                                        </small>
                                    </a>
                                    <a href="{{url('users/delete')}}/{{$user->id}}" class="btn btn-sm warning"  onclick="return confirm('Are you sure?')">
                                        {{ trans('backLang.delete') }}</a>

                                </td>

                                <td class="text-center">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="box-body box-profile">
                                                        @if($user->photo == "null")
                                                        <img class="profile-user-img img-responsive img-circle" style="    width: 20% !important;" src="{{url("uploads/users")}}/{{$user->photo}}" alt="User profile picture">
                                                        @else
                                                          <img  style="    width: 20% !important;"class="profile-user-img img-responsive img-circle" src="http://emarketingbakers.com/shama/public/uploads/users/15628522961345.png" alt="User profile picture">

                                                        
                                                        @endif
        

                                                        <h3 class="profile-username text-center">{{$user->name}} </h3>

                                                        <p class="text-muted text-center">{{ trans('backLang.member_since') }}  {{$user->created_at}}  </p>

                                                        <ul class="list-group list-group-unbordered">
                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-user margin-r-5" aria-hidden="true"></i>{{ trans('backLang.full_name') }}</b> <a class="pull-right">ahmed </a>
                                                            </li>

                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-address-card margin-r-5"></i> {{ trans('backLang.email') }}</b> <a class="pull-right">{{$user->email}}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-phone margin-r-5"></i>{{ trans('backLang.phone') }}</b> {{$user->phone}}<a class="pull-right"></a>
                                                            </li>

                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-address-book-o margin-r-5"></i>{{ trans('backLang.address') }}</b>{{$user->address}} <a class="pull-right"></a>
                                                            </li>

                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-times margin-r-5"></i>{{ trans('backLang.member_since') }}</b> <a class="pull-right">{{$user->created_at}}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b><i class="fa fa-life-saver margin-r-5"></i>{{ trans('backLang.status') }}</b> <a class="pull-right"><span class="label label-success">
                                        {{$user->status == 1 ? "Active" : "NoT Active "}}
                                        </span></a>
                                                            </li>

                                                        </ul>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


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
