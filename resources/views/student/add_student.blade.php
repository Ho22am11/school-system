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
   {{ trans('students.add_student')}}
   
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('students.the_students')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('students.add_student')}}</span>
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
                    <form action="{{ route('student.store') }}" method="post"  autocomplete="off" enctype="multipart/form-data" >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.Name_ar') }}</label>
                                <input type="text" class="form-control" id="Name" name="Name" >
                            </div>
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.Name_en') }}</label>
                                <input type="text" class="form-control" id="Name_en" name="Name_en" >
                            </div>

                           



                        </div><br>

                        {{-- 2 --}}
                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Email') }} </label>
                                <input type="email" class="form-control" id="Email" name="Email" >
                            </div>
                            
                            

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Password') }} </label>
                                <input type="password" class="form-control" id="Password" name="Password" >
                            </div>


                           
                        </div><br>

                         {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('parent.Nationality') }} </label>
                                <select name="Nationality_id" id="Nationality_id" class="form-control">
                                 <option  selected> {{ trans('parent.Choose') }} </option>
                                 @foreach ($Nationalities as $Nationalitie)
                                     <option value="{{ $Nationalitie->id}}" >{{ $Nationalitie->name }}</option>
                                 @endforeach
                               
                                   
                                </select>
                                
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('teachers.Gender') }} </label>
                                <select id="Gender_id" name="Gender_id" class="form-control">
                                    <option  selected> {{ trans('teachers.Gender_chose') }} </option>
                                    @foreach ($Genders as $Gender)
                                     <option value="{{ $Gender->id}}" >{{ $Gender->name }}</option>
                                 @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.religions') }} </label>
                                <select id="religion_id" name="religion_id" class="form-control">
                                    <option  selected> {{ trans('students.religions_chose') }} </option>
                                    @foreach ($religions as $religion)
                                     <option value="{{ $religion->id}}" >{{ $religion->name }}</option>
                                 @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.yesr_birth') }}</label>
                                <select id="date_of_birth" name="date_of_birth" class="form-control">
                                    <?php 
                                    
                                    $this_year = date('Y');
                                    
                                    for($frist_year = $this_year-17 ; $frist_year <= $this_year-5 ;  $frist_year++ ){
                                        echo "<option value=\"$frist_year\" >$frist_year</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                           
                        </div><br>


                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('grade_list.grade') }} </label>
                                <select name="grade_id" id="grade_id" class="form-control"  onchange="console.log($(this).val())">
                                 <option  selected> {{ trans('parent.Choose') }} </option>
                                 @foreach ($Grades as $Grade)
                                 <option value="{{ $Grade->id}}" >{{ $Grade->name }}</option>
                                 @endforeach
                                   
                                </select>
                                
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('classrooms.classroom') }} </label>
                                <select id="classrooms" name="classrooms" class="form-control" onchange="console.log($(this).val())">
                                    <option  selected> {{ trans('classrooms.classroom') }} </option>
                                    
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('main_side.section') }} </label>
                                <select id="sections" name="sections" class="form-control">
                                    <option  selected> {{ trans('parent.Choose') }}</option>
                                    
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('parent.parent') }} </label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option  selected> {{ trans('parent.Choose') }} </option>
                                    @foreach ($Parents as $Parent)
                                     <option value="{{ $Parent->id}}" >{{ $Parent->Name_Father }}</option>
                                 @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                     <?php 
                                    
                                    $this_year = date('Y');
                                    
                                    for($frist_year = $this_year ; $frist_year <= $this_year+1 ;  $frist_year++ ){
                                        echo "<option value=\"$frist_year\" >$frist_year</option>";
                                    }

                                    ?>
                                </select>

                                    
                                 
                                </select>
                            </div>
                        </div><br>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year"> : <span class="text-danger"></label>
                                <input type="file" accept="image/*" name="photos[]" multiple>
                    
                            </div>
                    
                        </div>
                        
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