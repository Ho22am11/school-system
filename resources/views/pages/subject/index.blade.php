@extends('layouts.master')
@section('title')
{{ trans('main_side.subject')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.subject')}}</h4>
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
							
					
							
							<div class="card-body">
								<div class="table-responsive">
                                    <div>
                                        <a href="{{ route('subjects.create')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('students.add_subject')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.name')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.grade')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Name_Teacher')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
									
											@foreach ($subjects as $subject)
												
											
											<tr>

												<td>{{ $loop->index+1}}</td>
												<td>{{ $subject->name}}</td>
												<td>{{ $subject->grades->name}}</td>
												<td>{{ $subject->classrooms->name}}</td>
												<td>{{ $subject->teachers->Name}}</td>
											</tr>

											@endforeach
										
									
										</tbody>
									</table>
							
						
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