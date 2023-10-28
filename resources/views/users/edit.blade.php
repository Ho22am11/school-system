@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    اضافة مستخدم
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                التعديل</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.updatee',[$user->id])}}" method="POST" >
                        @csrf


                         <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الاسم </label>
                                <input type="text" class="form-control" id="name" name="name"
                                  value="{{ $user->name }}" required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">البريد الالكتروني</label>
                                <input type="email" class="form-control" id="email " name="email"
                                value="{{ $user->email }}" required>
                            </div>

                            @if ($user->roles)
                            @foreach ( $user->roles as $user_role)

                                <div class="col">
                                    <label>الادوار</label>
                                    <input class="form-control "
                                        type="text" value="{{ $user_role->name }}" required readonly>
                                </div>

                            @endforeach
                            @endif

                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الدور</label>
                                <select name="role_name" id="role_name" class="form-control SlectBox" >
                                    <!--placeholder-->
                                    <option value="" selected disabled>اضف الدور</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id  }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تعديل</button>
                        </div>







                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.role.del',[$user->id])}}" method="POST" >
                        @csrf



                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">حذف الدور  </label>
                                @can('ازاله صلاحيه')


                                <select name="role_name" id="role_name" class="form-control SlectBox" >
                                    <!--placeholder-->
                                    <option value="" selected disabled>احذف الدور</option>
                                    @foreach ($user->roles as $user_role)
                                    <option value="{{ $user_role->id  }}">{{$user_role->name }}</option>
                                    @endforeach

                                </select>
                                @endcan
                            </div>
                        </div>

                        <br>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حذف</button>
                        </div>







                    </form>
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
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <!-- date time JS -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>








@endsection
