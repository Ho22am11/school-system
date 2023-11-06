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
                                              
                                                       <?php $i++; ?>
                                                     <tr>
                                                       <td>{{ $i }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>




                                                    <td><button class="btn btn-outline-success btn-sm"
                                                        data-id=""  data-section_name=""
                                                        href="#exampleModal2"
                                                            data-description="" data-toggle="modal"
                                                        data-target="#exampleModal2">{{ trans('grade_list.edit') }}</button>
                                                   



                                                    <button class="btn btn-outline-danger btn-sm " data-id=""
                                                        data-section_name="" data-toggle="modal"
                                                        href="#modaldemo9">{{ trans('grade_list.delete') }}</button>
                                             
                                                    </td>
                                                     </tr>
                                                




										</tbody>
									</table>

			            	</div>
                        </div>
                      </div>
                  </div>
                  <div class="modal" id="modaldemo8">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">اضافه قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">اسم القسم</label>
                                        <input type="text" class="form-control" id="section_name" name="section_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">ملاحظات</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
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
                              <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                              <div class="modal-body">

                                <form action="" method="post" autocomplete="off">
                                  {{method_field('put')}}
                                  {{csrf_field()}}
                                  <div class="form-group">
                                      <input type="hidden" name="id" id="id" value="">
                                      <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                                      <input class="form-control" name="section_name" id="section_name" type="text">
                                  </div>
                                  <div class="form-group">
                                      <label for="message-text" class="col-form-label">ملاحظات:</label>
                                      <textarea class="form-control" id="description" name="description"></textarea>
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
                                <form action="" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="section_name" id="section_name" type="text" readonly>
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
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })
</script>
<script>

    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>
@endsection
