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

                                                href="#exampleModal2" data-id="{{ $classroom->id }}"  data-name="{{ $classroom->getTranslation('name' , 'ar') }}"
                                                data-name_en="{{ $classroom->getTranslation('name' , 'en') }}" data-grade_id ={{ $classroom->grade_id }}
                                                     data-toggle="modal"
                                                data-target="#exampleModal2">{{ trans('grade_list.edit')}}</button>
                                 

                                            </td>
                                            
                                            <td>


                                                <form action="{{ route('grade.delete' , [$classroom->id])}}" method="post">
                                                    @csrf
                                                    <button type="submit"  class="btn btn-outline-danger btn-sm">{{ trans('grade_list.delete')}}</button>
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


                <!-- add model  -->
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

<!-- edit -->

<div class="modal" id="exampleModal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ trans('grade_list.edit_grade') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <form action="{{ route('classroom.update' , $id = 1 )}}" method="post" autocomplete="off">
                    {{method_field('put')}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="hidden" id="id" name="id">
                        <label for="exampleInputEmail1">ادخل لاسم بلعربي</label>
                        <input  type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">add name in english</label>
                        <input  type="text" class="form-control" id="name_en" name="name_en" required>
                    </div>
                    <div class="col">
                        <label for="Name_en"
                        class="mr-sm-2">{{ trans('grade_list.grade_add')}}
                        :</label>

                        <div class="box">
                            <select   id="grade_id" name="grade_id" class="form-control">
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                   

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ trans('grade_list.confirm')}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('grade_list.close')}}</button>
                    </div>
                </form>
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
        var name = button.data('name')
        var name_en = button.data('name_en')
        var grade_id = button.data('grade_id')


        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #name_en').val(name_en);
        modal.find('.modal-body #grade_id').val(grade_id);


    })
</script>
@endsection