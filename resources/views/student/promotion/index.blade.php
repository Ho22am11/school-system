@extends('layouts.master')
@section('title')
{{ trans('main_side.student_promotions')}}
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.studants')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('main_side.student_promotions')}}</span>
						</div>
					</div>
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-md-12 mb-30">
                    <div class="card card-statistics h-100">
                    <div class="card-body">
                    <h6 style="color: red;font-family: Cairo">المرحلة الدراسية القديمة</h6><br>

                    <form method="post" action="{{ route('promotion.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id" required onchange="console.log($(this).val())" >
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id" required onchange="console.log($(this).val())">
                                   
                                </select>
                            </div>

                            <div class="form-group col">
                                <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                <select class="custom-select mr-sm-2" name="section_id" required>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year" >
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        <?php
                                        $this_year = date('Y');
                                        for($year = $this_year ; $year <= $this_year+1 ; $year++ )
                                           echo "<option value =$year>$year</option>"
                                        ?>


                                       
                                    </select>
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo">المرحلة الدراسية الجديدة</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">{{trans('Students_trans.Grade')}}</label>
                                <select class="custom-select mr-sm-2" name="Grade_id_new" >
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">{{trans('Students_trans.classrooms')}}: <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id_new" >

                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="section_id">:{{trans('Students_trans.section')}} </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >

                                </select>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                        <?php
                                        $this_year = date('Y');
                                        for($year = $this_year ; $year <= $this_year+1 ; $year++ )
                                           echo "<option value =$year>$year</option>"
                                        ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                    </form>

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
<script>
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() { 
            var GradeId = $(this).val();   
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('section') }}/" + GradeId,   //we go in this url
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Classroom_id"]').empty();  
                         $('select[name="Classroom_id"]').append('<option  selected disabled > {{trans('Parent_trans.Choose')}} </option>');
                        $.each(data, function(key, value) {     
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="Classroom_id"]').on('change', function() { 
            var GradeId = $(this).val();   
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + GradeId,   //we go in this url
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id"]').empty();  
                        $.each(data, function(key, value) {      
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="Grade_id_new"]').on('change', function() { 
            var GradeId = $(this).val();   
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('section') }}/" + GradeId,   //we go in this url
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Classroom_id_new"]').empty();  
                        $('select[name="Classroom_id_new"]').append('<option  selected disabled > {{trans('Parent_trans.Choose')}} </option>');
                        $.each(data, function(key, value) {      
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
        $('select[name="Classroom_id_new"]').on('change', function() { 
            var GradeId = $(this).val();   
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('sections') }}/" + GradeId,   //we go in this url
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section_id_new"]').empty();  
                        $.each(data, function(key, value) {      
                            $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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