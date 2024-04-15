@extends('layouts.master')
@section('title')
{{ trans('main_side.online_classes')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.online_classes')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main_side.connect_with_zoom_direct')}}</span>
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
                                        <a href="{{ route('online_classes.create')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('students.add_class')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.Grade')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.classrooms')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.section')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('teachers.Name_Teacher')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('students.name')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('main_side.subject')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.time')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.start_in')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.link')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
                                            @foreach ($online_classes as $online_class)
												
											
											<tr>

												<td>{{ $loop->index+1}}</td>
												<td>{{ $online_class->name}}</td>
												<td>{{ $online_class->subjects->name }}</td>
												<td>{{ $online_class->teachers->Name }}</td>
												<td>{{ $online_class->grades->name }}</td>
												<td>{{ $online_class->classrooms->name }}</td>
												<td>{{ $online_class->sections->name }}</td>

									

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