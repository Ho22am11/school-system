@extends('layouts.master')
@section('title')
{{ trans('main_side.section_list')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.section_list')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
						</div>
					</div>
					
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					
					
                    @foreach ($grades as $grade)
				  	
                    <div class="col-xl-12">
						<div class="card">
                        	
                            <div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0"> {{ $grade->name}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
						
                            
                        
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>

                                                <th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.section')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										@foreach ($sections as $section)
										@if ($section->grade_id == $grade->id  )
											
										
										<tr>
											<td>{{ $loop->index+1 }}</td>
											<td>{{ $section->classroom->name}}</td>
											<td>{{ $section->name}}</td>
											<td>
												<a href="{{ route('attendances.show' , $section->id )}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">{{ __('main_side.student_list')}}</a>
											</td>
										</tr>

										@endif
											
										@endforeach
										<tbody>
										
										</tbody>
									</table>
							
                       
						</div>
                       
                      </div>
                      
                       </div>
                       @endforeach
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