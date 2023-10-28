@extends('layouts.master')
@section('title')
 الفواتير المحذوفه
@stop
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المحذوفه</span>
        </div>
    </div>
    </div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">

                        @if (session()->has('restore_invoice'))
                        <script>
                            window.onload = function() {
                                notif({
                                    msg: "تم اعاده الفاتورة بنجاح",
                                    type: "success"
                                })
                            }

                                     </script>
                        @endif
                        @if (session()->has('delete_invoice'))
					<script>
						window.onload = function() {
							notif({
								msg: "تم حذف الفاتورة بنجاح",
								type: "success"
							})
						}

				  		   	</script>
			     			@endif

                <div class="col-xl-12">
						<div class="card">
                            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">رقم الفاتوره</th>
                                    <th class="wd-15p border-bottom-0">تاريخ الفاتوره</th>
                                    <th class="wd-15p border-bottom-0">تاريخ الاستحقاق</th>
                                    <th class="wd-15p border-bottom-0">المنتج</th>
                                    <th class="wd-15p border-bottom-0">القسم</th>
                                    <th class="wd-15p border-bottom-0">الخصم</th>
                                    <th class="wd-15p border-bottom-0">نسبه الضريبه</th>
                                    <th class="wd-15p border-bottom-0">قيمه الضريبه </th>
                                    <th class="wd-15p border-bottom-0">الاجمالي</th>
                                    <th class="wd-15p border-bottom-0">الحاله </th>
                                    <th class="wd-15p border-bottom-0">ملاحظه </th>
                                    <th class="wd-15p border-bottom-0">العمليات </th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php $i =0; ?>
                                @foreach ($trashedinvolces as $invoice )
                                <?php $i++; ?>

                                <tr>

                                    <td>{{ $i }}</td>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->invoice_Date }}</td>
												<td>{{ $invoice->Due_date }}</td>
												<td>{{ $invoice->product }}</td>
                                    <td>
                                        {{ $invoice->section->section_name }}

                                    </td>
                                    <td>{{ $invoice->Discount }}</td>
												<td>{{ $invoice->Rate_VAT }}</td>
												<td>{{ $invoice->Value_VAT }}</td>
												<td>{{ $invoice->Total }}</td>
                                    <td>
                                        @if ($invoice->Value_Status == 1)
                                        <span class="text-success">{{ $invoice->Status }}</span>
                                    @elseif ($invoice->Value_Status == 2)
                                        <span class="text-danger">{{ $invoice->Status }}</span>
                                    @else
                                       <span class="text-warning">{{ $invoice->Status }}</span>

                                    @endif

                                    </td>
                                    <td> {{ $invoice->note }} </td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info" data-toggle="dropdown" type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">


                                                <a class="dropdown-item" href="{{ url('restore_inv') }}/ {{ $invoice->id  }}">اعاده  </a>

                                                <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                    data-invoice_number="{{ $invoice->invoice_number }}"
                                                    data-toggle="modal" data-target="#delete_invoice"><i
                                                        class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                    الفاتورة</a>


                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach




                            </tbody>
                        </table>


            </div>
            </div>
            				     <!-- حذف الفاتورة -->
    <div class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<form action="{{ route('destroy','test') }}" method="post">
					{{ method_field('delete') }}
					{{ csrf_field() }}
			</div>
			<div class="modal-body">
				هل انت متاكد من عملية الحذف ؟
				<input type="hidden" name="invoice_id" id="invoice_id" value="">
				<input type="hidden" name="invoice_number" id="invoice_number" value="">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
				<button type="submit" class="btn btn-danger">تاكيد</button>
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
  <!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<script>
	$('#delete_invoice').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var invoice_id = button.data('invoice_id')
		var invoice_number = button.data('invoice_number')
		var modal = $(this)
		modal.find('.modal-body #invoice_id').val(invoice_id);
		modal.find('.modal-body #invoice_number').val(invoice_number);
	})

</script>
@endsection
