@extends('layouts.master')
@section('title')
{{ trans('fees.fees')}}
@stop
@section('css')

<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('fees.fees')}}
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                            </span>
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
									<h4 class="card-title mg-b-0"> {{ trans('main_side.student_list')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							
							<div class="card-body">
								<div class="table-responsive">
                                    <div>
                                        <a href="{{ route('student.create')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('main_side.add_studant')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('student.name')}}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('fees.type')}}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('grade_list.grade')}}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom')}}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('fees.amount')}}</th>
                                        <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fees as $fee)
											<tr>
											<td> {{ $loop->index+1}}</td>
											<td>{{ $fee->students->name }}</td>
											<td>@if($fee->type == 1)

                                                {{ trans('fees.school_expenses') }}
                                        
                                        
                                            @elseif($fee->type == 2)
                                            {{ trans('fees.bus_Expenses') }}
    
                                       
                                           @else
                                           {{ trans('fees.uneform_Expenses') }}
                                            @endif</td>
											
											<td>{{ $fee->grades->name }}</td>
											<td>{{ $fee->classrooms->name }}</td>
											<td>{{ $fee->amount }}</td>
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