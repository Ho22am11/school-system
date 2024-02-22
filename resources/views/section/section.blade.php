@extends('layouts.master')
@section('title')
الاقسام
@stop
@section('css')
<!-- Internal Data table css -->
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
							<h4 class="content-title mb-0 my-auto">{{trans('main_side.section')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('main_side.section_list')}}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
				<div class="row">
                   <!-- add massege-->
                    @if (session()->has('Add'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>{{ session()->get('Add') }}</strong>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                            </div>
                                @endif
                                <!--  end add massege-->
                                <!-- errors massege-->
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                                              @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!--  end errors massege-->
                            <!--  edit massege-->

                            @if (session()->has('edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>{{ session()->get('edit') }}</strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                              </div>
                                  @endif

                               <!-- end add massege-->
                               <!--  delete massege-->

                         @if (session()->has('delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('delete') }}</strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                              </div>
                        @endif

                               <!-- end delete massege-->
                    <div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{trans('main_side.section')}}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>	
							</div>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">{{ trans('section.add_section')}}</a>
                            </div>
                           
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
                                                <th class="wd-5p border-bottom-0">#</th>
												<th class="wd-15p border-bottom-0">{{ trans('section.name_section')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('classrooms.classroom_name')}}</th>
                                                <th class="wd-15p border-bottom-0">{{ trans('grade_list.grade_name')}}</th>
												<th class="wd-15p border-bottom-0">{{ trans('grade_list.process') }}</th>


											</tr>
										</thead>
										<tbody>

											 <?php $i = 0; ?>
                                             @foreach ($sections as $section)
                                              
                                                       <?php $i++; ?>
                                                     <tr>
                                                       <td>{{ $i }}</td>
                                                        <td>{{ $section->name}}</td>
                                                        <td>{{ $section->classroom->name}}</td>
                                                        <td>{{ $section->grade->name}}</td>




                                                    <td><button class="btn btn-outline-success btn-sm"
                                                        data-id="{{ $section->id }}"  data-name="{{ $section->getTranslation('name', 'ar') }}"
                                                        data-grade="{{ $section->grade->name }}" 
                                                        href="#exampleModal2"
                                                            data-name_en="{{ $section->getTranslation('name', 'en') }}" data-toggle="modal"
                                                        data-target="#exampleModal2">{{ trans('grade_list.edit') }}</button>
                                                   



                                                    <button class="btn btn-outline-danger btn-sm " data-id="{{ $section->id }}"
                                                        data-name="{{ $section->name }}" data-toggle="modal"
                                                        href="#modaldemo9">{{ trans('grade_list.delete') }}</button>
                                             
                                                    </td>
                                               
                                                    </tr>
                                            @endforeach
                                                




										</tbody>
									</table>

			            	</div>
                        </div>
                      </div>
                  </div>
                  <!-- add model -->
                  <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">{{ trans('section.add_section')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.store')}}" method="post" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">ادخل الاسم بلعربي</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">enter the name in english</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en">
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('grade_list.grade_name')}}</label>
                                        <select name="grade_id" class="form-control SlectBox"  onchange="console.log($(this).val())" >
                                            <!--placeholder-->
                                            <option value="" selected disabled>{{ trans('section.chose_section')}}</option>
                                            @foreach ($grades as $grade)
                                            <option value="{{ $grade->id  }}">{{ $grade->name }}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('classrooms.classroom_name')}}</label>
                                        <select id="classrooms" name="classrooms" class="form-control">
                                           
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">{{ trans('teachers.Name_Teacher')}}</label>
                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2" >
                                            <!--placeholder-->
                                            <option value="" selected disabled>{{ trans('teachers.teacher_chose')}}</option>
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id  }}">{{ $teacher->Name }}</option>
                                            @endforeach
                                           
                                        </select>
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




                   <!-- edit -->

               
                                                     
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                      aria-hidden="true">
                           <div class="modal-dialog" role="document">
                                                                   <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">{{ trans('section.edit')}}</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                                 <div class="modal-body">

                                   <form action="{{ route('section.update') }}" method="post" autocomplete="off">
                                     {{method_field('put')}}
                                     {{csrf_field()}}
                                     <div class="form-group">
                                         <input type="hidden" name="id" id="id" value="">
                                         <label for="recipient-name" class="col-form-label"> الاسم بلعربي:</label>
                                         <input class="form-control" name="name" id="name" type="text">
                                     </div>
                                     <div class="form-group">
                                     
                                       <label for="recipient-name" class="col-form-label"> enter the name in english:</label>
                                       <input class="form-control" name="name_en" id="name_en" type="text">
                                   </div>
                                     <div class="col">
                                       <label for="inputName" class="control-label">  </label>
                                       <select name="grade_id" id="grade" class="form-control SlectBox"  onchange="console.log($(this).val())" >

                                           <option value="" selected disabled> </option>
                                           @foreach ($grades as $grade)
                                           <option value="{{ $grade->id  }}">{{ $grade->name }}</option>
                                           @endforeach
                                          
                                       </select>
                                   </div>
                                   <div class="col">
                                       <label for="inputName" class="control-label">{{ trans('classrooms.classroom_name')}}</label>
                                       <select id="classrooms" name="classrooms" class="form-control">
                                       </select>
                                   </div>



                     <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">تاكيد</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                     </div>
                   </div>
                   </form>
                   </div>
                   </div>
               


                  

                  <!-- end eidt -->





            </div>
                 <!-- delete -->

                      <!-- delete -->

                <div class="modal" id="modaldemo9">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                               type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('section.delete')}}" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="name" id="name" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
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
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
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
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script>
    $(document).ready(function() {
        $('select[name="grade_id"]').on('change', function() {
            var GradeId = $(this).val();
            if (GradeId) {
                $.ajax({
                    url: "{{ URL::to('section') }}/" + GradeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classrooms"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="classrooms"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script>
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var name_en = button.data('name_en')



        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #name_en').val(name_en);


    })
</script>
<script>

    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    })
</script>
@endsection
