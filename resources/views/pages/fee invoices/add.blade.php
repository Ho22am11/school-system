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
                    <form action="{{ route('fee_invoices.store') }}" method="post"  autocomplete="off" enctype="multipart/form-data" >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.name') }} </label>
                                <select id="student_id" name="student_id" class="form-control">                                   
                                     <option value="{{ $student->id}}" selected >{{ $student->name }}</option>
                                 
                                </select>
                                <input type="hidden" value="{{ $student->Grade_id }}" name="Grade_id">
                                <input type="hidden" value="{{ $student->classroom_id }}" name="classroom_id">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.name') }} </label>
                                <select id="type" name="type" class="form-control">   
                                    @foreach($fees as $fee)                               
                                     <option value="{{ $fee->id}}"  > 
                                        @if($fee->type == 1)

                                            {{ trans('fees.school_expenses') }}
                                    
                                    
                                        @elseif($fee->type == 2)
                                        {{ trans('fees.bus_Expenses') }}

                                   
                                       @else
                                       {{ trans('fees.uneform_Expenses') }}
                                        @endif</option>
                                    @endforeach
                                 
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('students.name') }} </label>
                                <select id="amount" name="amount" class="form-control">   
                                    @foreach($fees as $fee)                               
                                     <option value="{{ $fee->amount}}" selected >{{ $fee->amount }}</option>
                                    @endforeach
                                 
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

@endsection