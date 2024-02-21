@extends('layouts.master')
@section('title')
{{ trans('main_side.List_Teachers')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.Teachers')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('main_side.List_Teachers')}}</span>
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
									<h4 class="card-title mg-b-0"> {{ trans('main_side.List_Teachers')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">
                                    <div>
                                        <a href="{{ route('add.teacher')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('teachers.Add_Teacher')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Name_Teacher')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Email')}} </th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.specialization')}} </th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Gender')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('teachers.Address')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
										
                                        
                                            
											<?php $i =0; ?>
									
											@foreach($teachers as $teacher)
											<?php $i++; ?>
											
											<tr>
												<td>{{ $i }}</td>
												<td>{{ $teacher->Name}}</td>
												<td>{{ $teacher->Email}}</td>
												<td>{{ $teacher->specializations->name}}</td>
												<td>{{ $teacher->genders->name}}</td>
												<td>{{ $teacher->Address}}</td>
												<td></td>
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