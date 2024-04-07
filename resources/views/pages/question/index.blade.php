@extends('layouts.master')
@section('title')
{{ trans('main_side.queastions')}}
@stop
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
		 				<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.queastions')}}</h4>
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
                                        <a href="{{ route('questions.create')}}" class="btn btn-success btn-sm nextBtn btn-lg pull-right">{{ trans('question.add_answare')}}</a>
                                </div><br>
                                    <table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('question.question')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('question.answares')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('question.answare_right')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('question.score')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('question.quizze')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }} </th>
												
                                            
											</tr>
										</thead>
										<tbody>
									
											@foreach ($questions as $question)
												
											
											<tr>

												<td>{{ $loop->index+1}}</td>
												<td>{{ $question->title}}</td>
												<td>{{ $question->answers }}</td>
												<td>{{ $question->right_answers }}</td>
												<td>{{ $question->score }}</td>
												<td>{{ $question->quizzes->name  }}</td>
				

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