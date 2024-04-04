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
{{ trans('main_side.subject')}}
   
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main_side.subject')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('exams.store') }}" method="post"   >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.name') }} </label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.name_en') }} </label>
                                <input type="text" name="name_en" class="form-control">
                            </div>
                            

                           
                        </div><br>

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('main_side.subject')}}</label>
                                <select id="subject_id" name="subject_id" class="form-control">   
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                 
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.term')}}</label>
                                <select id="term" name="term" class="form-control">   
                                    
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    
                                 
                                </select>
                            </div>

                            <div class="col">
                            <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="academic_year">
                                 <?php 
                                
                                $this_year = date('Y');
                                
                                for($frist_year = $this_year ; $frist_year <= $this_year+1 ;  $frist_year++ ){
                                    echo "<option value=\"$frist_year\" >$frist_year</option>";
                                }

                                ?>
                            </select>
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