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
    اضافة فاتورة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة فاتورة</span>
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
                    <form action="{{ route('teacher.store') }}" method="post" >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Name_ar') }}</label>
                                <input type="text" class="form-control" id="Name" name="Name" required>
                            </div>
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Name_en') }}</label>
                                <input type="text" class="form-control" id="Name_en" name="Name_en" required>
                            </div>

                           



                        </div><br>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Email') }} </label>
                                <input type="email" class="form-control" id="Email" name="Email" required>
                            </div>
                            
                            

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Password') }} </label>
                                <input type="password" class="form-control" id="Password" name="Password" required>
                            </div>


                           
                        </div><br>

                        <div class="row">
                            <div class="col">
                                <label> {{ trans('teachers.Joining_Date') }} </label>
                                <input class="form-control fc-datepicker" name="Joining_Date" placeholder="YYYY-MM-DD" id="Joining_Date"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.specialization') }} </label>
                                <select name="Specialization_id" id="Specialization_id" class="form-control">
                                 <option  selected> {{ trans('teachers.specialization_chose') }} </option>
                                  @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}" > {{$specialization->name }}</option>
                                    @endforeach
                                   
                                </select>
                                
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Gender') }} </label>
                                <select id="Gender_id" name="Gender_id" class="form-control">
                                    <option  selected> {{ trans('teachers.Gender_chose') }} </option>
                                    @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                           
                        </div><br>


                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea"> {{ trans('teachers.Address') }}</label>
                                <textarea class="form-control" id="Address" name="Address" rows="3"></textarea>
                            </div>
                        </div><br>

                        

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"> {{ trans('parent.Finish') }}</button>
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

<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Internal Fileuploads js-->
<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
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
   <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

@endsection