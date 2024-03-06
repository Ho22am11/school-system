@extends('layouts.master')
@section('title')
{{ trans('students.Student_details')}}
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('students.the_students')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('students.Student_details')}}</span>
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
                                <div class="card-body">
                                    <div class="tab nav-border">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                                   role="tab" aria-controls="home-02"
                                                   aria-selected="true">{{trans('students.Student_details')}}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                                   role="tab" aria-controls="profile-02"
                                                   aria-selected="false">{{trans('parent.Attachments')}}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                                 aria-labelledby="home-02-tab">
                                                <table class="table table-striped table-hover" style="text-align:center">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">{{trans('Students.name')}}</th>
                                                        <td>{{ $Student->name }}</td>
                                                        <th scope="row">{{trans('parent.Email')}}</th>
                                                        <td>{{$Student->email}}</td>
                                                        <th scope="row">{{trans('teachers.Gender')}}</th>
                                                        <td>{{ $Student->genders->name }}</td>
                                                        <th scope="row">{{trans('parent.Nationality')}}</th>
                                                        <td>{{ $Student->nationalities->name }}</td>
                                                    </tr>
            
                                                    <tr>
                                                        <th scope="row">{{trans('grade_list.grade')}}</th>
                                                        <td>{{ $Student->grades->name }}</td>
                                                        <th scope="row">{{trans('classrooms.classroom')}}</th>
                                                        <td>{{ $Student->classrooms->name }}</td>
                                                        <th scope="row">{{trans('main_side.section')}}</th>
                                                        <td>{{ $Student->sections->name }}</td>
                                                        <th scope="row">{{trans('Students.Joining_Date')}}</th>
                                                        <td>{{ $Student->Date_Birth}}</td>
                                                    </tr>
            
                                                    <tr>
                                                        <th scope="row">{{trans('parent.name_father')}}</th>
                                                        <td>{{ $Student->parents->Name_Father }}</td>
                                                        <th scope="row">{{trans('parent.name_mother')}}</th>
                                                        <td>{{ $Student->parents->Name_Mother }}</td>
                                                        <th scope="row"></th>
                                                        <th ></th>
                                                        
                                                        <th scope="row"></th>
                                                        <td></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
            
                                            <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                                 aria-labelledby="profile-02-tab">
                                                <div class="card card-statistics">
                                                    <div class="card-body"> 
                                                        <form method="POST" action="{{ route('upload_attachment') }}" enctype="multipart/form-data">
                                                              
                                                            {{ csrf_field() }}
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="academic_year">{{trans('parent.Attachments')}}
                                                                        : <span class="text-danger">*</span></label>
                                                                    <input type="file" accept="image/*" name="photos[]" multiple required>
                                                                    <input type="hidden" name="student_name" value="{{$Student->name}}">
                                                                    <input type="hidden" name="student_id" value="{{$Student->id}}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <button type="submit" class="button button-border x-small">
                                                                   {{trans('grade_list.confirm')}}
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                           style="text-align:center">
                                                        <thead>
                                                        <tr class="table-secondary">
                                                            <th scope="col">#</th>
                                                            <th scope="col">{{trans('students.filename')}}</th>
                                                            <th scope="col">{{trans('students.created_at')}}</th>
                                                            <th scope="col">{{trans('grade_list.process')}}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($Student->images as $attachment)
                                                            <tr style='text-align:center;vertical-align:middle'>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$attachment->filename}}</td>
                                                                <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                                <td colspan="2">
                                                                    <a class="btn btn-outline-info btn-sm"
                                                                       href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                                       role="button"><i class="fas fa-download"></i>&nbsp; {{trans('Students_trans.Download')}}</a>
            
                                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                                            title="{{ trans('Grades_trans.Delete') }}">{{trans('Students_trans.delete')}}
                                                                    </button>
            
                                                                </td>
                                                            </tr>
                                                            
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
@endsection
@section('js')
@endsection