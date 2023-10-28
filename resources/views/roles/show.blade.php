@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
@section('title')
اضافة الصلاحيات - مورا سوفت للادارة القانونية
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                نوع مستخدم</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>خطا</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif





<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <div class="form-group">


                            <p>اسم الصلاحية :</p>
                            <div class="mb-3">

                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name}}">

                            </div>
                              <div class="col-lg-4">
                                <ul id="treeview1">
                                    <li><a href="#">الصلاحيات</a>
                                        <ul>
                                    </li>
                                    @if(!empty($role->permissions))
                                    @foreach($role->permissions as $role_permission)
                                    <li>{{  $role_permission->name }}</li>
                                    @endforeach
                                    @endif
                                    </li>

                                </ul>
                                </li>
                                </ul>
                              </div>
                              <br>



                              مستخدمين {{ $role->name }}
                              @if ($role->users)
                              <br>
                              <ul>
                                @foreach ( $role->users as $role_user)
                                <li><spa>{{ $role_user->name }}</spa></li>
                                @endforeach
                              </ul>
                              @endif








                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

{!! Form::close() !!}
@endsection
@section('js')
<!-- Internal Treeview js -->
<script src="{{URL::asset('assets/plugins/treeview/treeview.js')}}"></script>
@endsection
