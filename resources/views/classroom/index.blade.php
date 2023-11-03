@extends('layouts.master')
@section('title')
 {{ trans('classrooms.classroom_list') }}
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
							<h4 class="content-title mb-0 my-auto"> {{ trans('classrooms.classroom') }}
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  {{ trans('classrooms.classroom_list') }}
                            </span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                    <div class="col-xl-12">
						<div class="card">
                            
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0"> {{ trans('classrooms.classroom_all') }}
                                    </h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
					
							</div>
                        
                     <div class="card-body">
                        @if (session()->has('Add'))
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong>{{ session()->get('Add') }}</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                       </div>
                       @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                          @endif
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal"
                             href="#exampleModal"> {{ trans('classrooms.classroom_add') }}
                            </a>
                        </div>
                        <div class="row">
                       
                        
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-5p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0"> {{ trans('classrooms.classroom_name') }}
                                        </th>
                                        <th class="wd-15p border-bottom-0"> {{ trans('grade_list.grade_name') }}
                                        </th>

                                        <th class="wd-15p border-bottom-0"> {{ trans('grade_list.process') }}
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>

                                     <?php $i = 0; ?>
                                           
                                               
                                        @foreach ($classrooms as $classroom)
                                        <?php $i++; ?>
                                             <tr>
                                               <td>{{ $i }}</td>
                                                <td>{{$classroom->name}}</td>
                                                <td>{{$classroom->grade->name}}</td>
                                             
                                              


                            


                                                <td><button class="btn btn-outline-success btn-sm"

                                                href="#exampleModal2" data-id="{{ $classroom->id }}"  data-grade_name="{{ $classroom->getTranslation('name' , 'ar') }}"
                                                data-grade_name_en="{{ $classroom->getTranslation('name' , 'en') }}"
                                                     data-toggle="modal"
                                                data-target="#exampleModal2">تعديل</button>
                                 

                                            </td>
                                            
                                            <td>


                                                <form action="{{ route('grade.delete' , [$classroom->id])}}" method="post">
                                                    @csrf
                                                    <button type="submit"  class="btn btn-outline-danger btn-sm">حذف</button>
                                                </form>

                                    
                                                                 
                                    
                                            </td>
                                             </tr>

                                
                                                  
                                         @endforeach
                                                         
                                </form>
                              </div>
                  </div>
                                   




                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
				</div>


                <!-- edit -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classrooms.classroom_add') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route('classroom.store')}}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>

                                    <div class="row">

                                        <div class="col">
                                            <label for="name"
                                            class="mr-sm-2">الاسم بلعربي 
                                            :</label>
                                            <input class="form-control" type="text" name="name" required />
                                        </div>


                                        <div class="col">
                                            <label for="name"
                                            class="mr-sm-2">Name in English
                                            :</label>
                                            <input class="form-control" type="text" name="name_class_en" required />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                            class="mr-sm-2">{{ trans('grade_list.grade_add')}}
                                            :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="Grade_id">
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2"> {{ trans('grade_list.process')}} 
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('grade_list.delete')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classrooms.add_row')}}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('grade_list.close')}}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('grade_list.confirm')}}</button>
                            </div>


                        </div>
                    </div>
                </form>
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
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var grade_name = button.data('grade_name')
        var grade_name_en = button.data('grade_name_en')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #grade_name').val(grade_name);
        modal.find('.modal-body #grade_name_en').val(grade_name_en);

    })
</script>
@endsection