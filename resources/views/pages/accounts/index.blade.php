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
							<h4 class="content-title mb-0 my-auto">{{ trans('fees.fees')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
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
									<h4 class="card-title mg-b-0"> {{ trans('fees.fees')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">
                                    <div>
                                        <a href="{{ route('fee.create')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('fees.add_fee')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('students.name')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('grade_list.grade')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('main_side.section')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('fees.amount')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('fees.semester')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('Students_trans.academic_year')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
										
                                            @foreach($fees as $fee)
											<td> {{ $loop->index+1}}</td>
											<td>{{ $fee->name }}</td>
											<td>{{ $fee->grades->name }}</td>
											<td>{{ $fee->classrooms->name }}</td>
											<td>{{ $fee->sections->name }}</td>
											<td>{{ $fee->amount }}</td>
											<td>{{ $fee->semester }}</td>
											<td>{{ $fee->academic_year }}</td>
											<td> 
												<a href="{{ route('fee.edit' , $fee->id )}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
											</td>
											<td>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete{{$fee->id}}"  title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
											
											</td>

											@include('pages.accounts.Delete');
											
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