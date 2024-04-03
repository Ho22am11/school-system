@extends('layouts.master')
@section('title')
{{ trans('main_side.student_list')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.attendances')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('main_side.student_list')}}</span>
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
								<h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">
                                    <form method="post" action="{{ route('attendances.store') }}">

                                        @csrf
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.name')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Email')}} </th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.grade')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.section')}}</th>
                                                <th class="wd-30p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
										
                                            									
											@foreach($students as $student)
																				
											<tr>
												<td>{{ $loop->index+1 }}</td>
												<td>{{ $student->name}}</td>
												<td>{{ $student->email}}</td>
												<td>{{ $student->grades->name}}</td>
												<td>{{ $student->classrooms->name}}</td>
												<td>{{ $student->sections->name}}</td>
												<td>
													@if(isset($student->attendance()->where('date',date('Y-m-d'))->first()->student_id))

													<label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
														<input name="attendences[{{ $student->id }}]" disabled
															   {{ $student->Attendance()->first()->attendances_student == 1 ? 'checked' : '' }}
															   class="leading-tight" type="radio" value="presence">
														<span class="text-success">{{ __('students.present')}}</span>
													</label>
						
													<label class="ml-4 block text-gray-500 font-semibold">
														<input name="attendences[{{ $student->id }}]" disabled
															   {{ $student->Attendance()->first()->attendances_student ==  0 ? 'checked' : '' }}
															   class="leading-tight" type="radio" value="absent">
														<span class="text-danger">{{ __('students.absent')}}</span>
													</label>
						
												@else
						
													<label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
														<input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
															   value="presence">
														<span class="text-success">{{ __('students.present')}}</span>
													</label>
						
													<label class="ml-4 block text-gray-500 font-semibold">
														<input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
															   value="absent">
														<span class="text-danger">{{ __('students.absent')}}</span>
													</label>
						
												@endif
                                                </td>
											</tr>

											<input value="{{ $student->Grade_id }}" type="hidden" name="Grade_id">
									        <input value="{{ $student->classroom_id }}" type="hidden" name="classroom_id">
									        <input value="{{ $student->section_id }}" type="hidden"  name="section_id">
								
											@endforeach
                                      
																
										
									
										</tbody>
									</table>

									
                                    <P>
                                        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                                    </P>
                                </form><br>
							
						
						</div>
                      </div>
                       </div>
                    </div>
                   </div>
				     <!-- حذف الفاتورة -->
  
</div>

					
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!-- Internal Data tables -->
@endsection