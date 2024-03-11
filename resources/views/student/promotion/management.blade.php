@extends('layouts.master')
@section('title')
{{ trans('main_side.management_promotions')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.studants')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('main_side.management_promotions')}}</span>
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
									<h4 class="card-title mg-b-0"> {{ trans('main_side.management_promotions')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                        {{ __('promotion.review')}}
                                      </button><br><br>

                                      
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th>#</th>
												<th class="alert-info">{{ trans('students.name')}} {{ trans('main_side.studants')}} </th>
												<th class="alert-danger">{{ __('promotion.The_current_grade')}}  </th>
                                                <th class="alert-danger">{{ trans('promotion.The_current_classroom')}}</th>
                                                <th class="alert-danger">{{ trans('promotion.The_current_section')}}</th>
                                                <th class="alert-danger">{{ trans('promotion.The_Last_year')}}</th>
                                                <th class="alert-success">{{ trans('promotion.The_previous_grade')}}</th>
												<th class="alert-success">{{ trans('promotion.The_previous_classroom')}}</th>
												<th class="alert-success">{{ trans('promotion.The_previous_section')}}</th>
												<th class="alert-success">{{ trans('promotion.The_current_year')}}</th>
                                                <th class="wd-20p border-bottom-0">{{ trans('My_Classes_trans.Processes') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
										
                                            									
											@foreach($promotions as $promotion)
																				
											<tr>
												<td>{{ $loop->index+1 }}</td>
												<td>{{ $promotion->students->name}}</td>
												<td>{{ $promotion->f_grades->name}}</td>
												<td>{{ $promotion->f_classrooms->name}}</td>
												<td>{{ $promotion->f_sections->name}}</td>
												<td>{{ $promotion->academic_year}}</td>
												<td>{{ $promotion->n_grades->name}}</td>
												<td>{{ $promotion->n_classrooms->name}}</td>
                                                <td>{{ $promotion->n_sections->name}}</td>
                                                <td>{{ $promotion->academic_year_new}}</td>
                                                <td>
													<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">
														{{ __('promotion.review_student')}}
													  </button>
													<Button type="button" class="btn btn-outline-success" data-toggle="model" data-target="#">{{ __('promotion.graduation')}}</Button>
												</td>
												@include('student.promotion.Delete_one');  
											</tr>
											
								        	     
											@endforeach
                                      
																
										
											@include('student.promotion.Delete_all');
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