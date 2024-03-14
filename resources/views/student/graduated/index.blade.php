@extends('layouts.master')
@section('title')
{{trans('main_side.graduated')}}
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('main_side.graduated')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>
					
				
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
						<div class="card">
							
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{trans('main_side.graduated_list')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-20p border-bottom-0">{{ trans('students.name')}}</th>
												<th class="wd-20p border-bottom-0">{{ trans('teachers.Email')}} </th>
												<th class="wd-10p border-bottom-0">{{ trans('grade_list.grade')}}</th>
                                                <th class="wd-10p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
                                                <th class="wd-10p border-bottom-0">{{ trans('main_side.section')}}</th>
												<th class="wd-10p border-bottom-0">{{ trans('teachers.Gender')}}</th>
                                                <th class="wd-30p border-bottom-0">{{ trans('grade_list.process') }} </th>
                                               
                                            
											</tr>
										</thead>
										<tbody>
										
                                            									
										@foreach($students as $student)
																				
											<tr>
												<td> {{ $loop->index+1}}</td>
												<td> {{ $student->name}}</td>
												<td>{{ $student->email}}</td>
												<td>{{ $student->grades->name}}</td>
												<td>{{ $student->classrooms->name}}</td>
												<td>{{ $student->sections->name}}</td>
												<td>{{ $student->genders->name}}</td>
												<td>
													<button type="button" class="btn btn-outline-succsses" data-toggle="modal" data-target="#Return_Student{{ $student->id}}">
														{{ __('promotion.review_student')}}
													  </button>
													  <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete{{$student->id}}">
														{{ __('promotion.review_student')}}
													  </button>
													
												</td>
                                              
											</tr>
											@include('student.graduated.return');
											@include('student.graduated.Delete');
										@endforeach

										
								
											
                                      
																
										
									
										</tbody>
									</table>
							
						
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