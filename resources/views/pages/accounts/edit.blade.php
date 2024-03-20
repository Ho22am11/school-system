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
   {{ trans('fee.create')}}
   
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('fees.fees')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
                    <form action="{{ route('fee.updatef') }}" method="post"  autocomplete="off" enctype="multipart/form-data" >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('Students_trans.name_ar') }}</label>
                                <input type="text" class="form-control" id="Name" name="Name" value="{{ $fee->getTranslation('name','ar') }}">
                                <input type="hidden" value="{{ $fee->id }} " name="id" >
                               
                            </div>
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('Students_trans.name_en') }}</label>
                                <input type="text" class="form-control" id="Name_en" name="Name_en" value=" {{ $fee->getTranslation('name' , 'en')}}" >
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('fee.amount') }}</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $fee->amount}}" >
                            </div>


                        </div><br>
   


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('grade_list.grade') }} </label>
                                <select name="grade_id" id="grade_id" class="form-control"  onchange="console.log($(this).val())">
                                 <option value="{{ $fee->Grade_id }}" selected> {{ $fee->grades->name }} </option>
                                 @foreach ($Grades as $Grade)
                                 <option value="{{ $Grade->id}}" >{{ $Grade->name }}</option>
                                 @endforeach
                                   
                                </select>
                                
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('classrooms.classroom') }} </label>
                                <select id="classrooms" name="classrooms" class="form-control" onchange="console.log($(this).val())">
                                    <option value="{{ $fee->classroom_id }}" selected> {{ $fee->classrooms->name }} </option>
                                    
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('main_side.section') }} </label>
                                <select id="sections" name="sections" class="form-control">
                                    <option  value="{{ $fee->section_id }}" selected > {{ $fee->sections->name }}</option>
                                    
                                </select>
                            </div> 
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('fees.type') }} </label>
                                <select id="type" name="type" class="form-control">
                                    <option value="1" > {{ trans('fees.school_expenses') }}</option>
                                    <option value="2" > {{ trans('fees.bus_Expenses') }}</option>
                                    <option value="3" > {{ trans('fees.uneform_Expenses') }}</option>
                                    
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col"> 
                                <div class="form-group">
                                    <label for="semester">{{trans('fees.semester')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="semester">
                                        <option value="{{ $fee->semester}}">{{ $fee->semester }}</option>
                                         <?php 
                                        
                                        $this_semester = 1 ;
                                        
                                        for($next_semester = $this_semester ; $next_semester <= $this_semester+1 ;  $next_semester++ ){
                                            echo "<option value=\"$next_semester\" >$next_semester</option>";
                                        }
    
                                        ?>
                                    </select>
    
                                        
                                     
                                    </select>
                                </div>
                                
                            </div>

                        <div class="col">  

                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option value="{{ $fee->academic_year}}">{{ $fee->academic_year}}</option>
                                     <?php 
                                    
                                    $this_year = date('Y');
                                    
                                    for($frist_year = $this_year ; $frist_year <= $this_year+1 ;  $frist_year++ ){
                                        echo "<option value=\"$frist_year\" >$frist_year</option>";
                                    }

                                    ?>
                                </select>

                                    
                                 
                                </select>
                            </div>
                        </div>
                       
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



   <script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var GradeId = $(this).val();
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('section') }}/" + GradeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classrooms"]').empty();
                        $('select[name="classrooms"]').append('<option  selected> {{ trans('parent.Choose') }}</option>');
                        $.each(data, function(key, value) {
                            $('select[name="classrooms"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script>

<script>
    $(document).ready(function() {
        $('select[name="classrooms"]').on('change', function() {
            var ClassroomId = $(this).val();
            if (ClassroomId) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + ClassroomId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="sections"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sections"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script>
@endsection