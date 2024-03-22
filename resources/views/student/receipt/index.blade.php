@extends('layouts.master')
@section('title')
{{ trans('students.receipt')}}
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
							<h4 class="content-title mb-0 my-auto">{{ trans('students.receipt')}}
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
							
							<div class="card-body">
						
                                    <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">#</th>
                                        <th class="wd-30p border-bottom-0">{{ trans('students.name')}}</th>

                                        <th class="wd-30p border-bottom-0">{{ trans('fees.amount')}}</th>
                                        <th class="wd-10p border-bottom-0">{{ trans('grade_list.process') }} </th>
                                        
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                 @foreach ($receipt_students as $receipt)
                                 <tr>
                                 
                                    <td>{{ $loop->iteration}}</td>
                                    <td> {{ $receipt->student->name}}</td>
                                    <td> {{ $receipt->Debit }}</td>
                                    <td> 
                                        <a href="{{ route('recepit_student.edit' , $receipt->id )}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete"  title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                    
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


               
               
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection