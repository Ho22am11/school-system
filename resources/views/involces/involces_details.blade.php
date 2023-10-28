@extends('layouts.master')
@section('title')
تفاصيل الفواتير
@stop
@section('css')
<link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ التفاصيل</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
                <div class="row row-sm">

                    <div class="col-xl-12">
                        @if (session()->has('Add'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                        <!-- div -->

                        <!-- /div -->
               <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                     <div class="text-wrap">
                       <div class="example">
                        <div class="panel panel-primary tabs-style-2">
                            <div class=" tab-menu-heading">
                                <div class="tabs-menu1">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs main-nav-line">
                                        <li><a href="#tab4" class="nav-link active" data-toggle="tab">معلومات الفاتوره</a></li>
                                        <li><a href="#tab12" class="nav-link" data-toggle="tab">حالات الفاتوره</a></li>
                                        <li><a href="#tab6" class="nav-link" data-toggle="tab">مرفقات </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body tabs-menu-body main-content-body-right border">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab4">
                                        <table class="table table-striped" style="text-align:center">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">رقم الفاتوره</th>
                                                    <td>{{ $involces->invoice_number }}</td>
                                                    <th scope="row">تاريخ الاستحقاق</th>
                                                    <td>{{ $involces->Due_date }}</td>
                                                    <th scope="row">تاريخ الفاتوره</th>
                                                    <td>{{ $involces->invoice_Date }}</td>
                                                    <th scope="row">المنتج</th>
                                                    <td>{{ $involces->product }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">القسم</th>
                                                    <td>{{ $involces->section->section_name }}</td>
                                                    <th scope="row">الخصم</th>
                                                    <td>{{ $involces->Discount }}</td>
                                                    <th scope="row">قيمة ضريبة القيمة المضافة</th>
                                                    <td>{{ $involces->Value_VAT }}</td>
                                                    <th scope="row">مبلغ التحصيل</th>
                                                    <td>{{ $involces->Amount_collection }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">مبلغ العمولة</th>
                                                    <td>{{ $involces->Amount_Commission }}</td>
                                                    <th scope="row">الخصم</th>
                                                    <td>{{ $involces->Rate_VAT }}</td>
                                                    <th scope="row">نسبة ضريبة القيمة المضافة</th>
                                                    <td>{{ $involces->Value_VAT }}</td>
                                                    <th scope="row">الاجمالي </th>
                                                    <td>{{ $involces->Total }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">الحالة الحالية</th>

                                                            @if ($involces->Value_Status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $involces->Status }}</span>
                                                                </td>
                                                            @elseif($involces->Value_Status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $involces->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $involces->Status }}</span>
                                                                </td>
                                                            @endif

                                                    <th scope="row">تاريخ الاضافه</th>
                                                    <td>{{ $involces->invoice_Date }}</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>




                                    <div class="tab-pane" id="tab12">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table text-md-nowrap" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-5p border-bottom-0">#</th>
                                                            <th class="wd-15p border-bottom-0">رقم الفاتوره</th>

                                                            <th class="wd-15p border-bottom-0">المنتج</th>
                                                            <th class="wd-15p border-bottom-0">القسم</th>
                                                            <th class="wd-15p border-bottom-0">الحاله </th>
                                                            <th class="wd-15p border-bottom-0">ملاحظه </th>
                                                            <th class="wd-15p border-bottom-0">تاريخ الاضافه</th>
                                                            <th class="wd-15p border-bottom-0">المستخدم</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                        <?php $i =0; ?>
                                                        @foreach ($details as $x)
                                                          <?php $i++; ?>
                                                           <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $x->invoice_number }}</td>
                                                            <td>{{ $x->product }}</td>
                                                            <td>{{ $involces->section->section_name }}</td>

                                                            @if ($x->Value_Status == 1)
                                                                <td><span
                                                                        class="badge badge-pill badge-success">{{ $x->Status }}</span>
                                                                </td>
                                                            @elseif($x->Value_Status ==2)
                                                                <td><span
                                                                        class="badge badge-pill badge-danger">{{ $x->Status }}</span>
                                                                </td>
                                                            @else
                                                                <td><span
                                                                        class="badge badge-pill badge-warning">{{ $x->Status }}</span>
                                                                </td>
                                                            @endif
                                                            <td>{{ $x->note }}</td>

                                                            <td>{{ $involces->invoice_Date }} </td>
                                                            <td>{{ $x->user }}</td>




                                                          </tr>
                                                        @endforeach





                                                    </tbody>
                                                </table>


                                    </div>
                                  </div>
                                    </div>





                                    <div class="tab-pane" id="tab6">
                                        <div class="table-responsive mt-15">
                                            <table class="table center-aligned-table mb-0 table table-hover"
                                                style="text-align:center">
                                                <thead>
                                                    <tr class="text-dark">
                                                        <th scope="col">م</th>
                                                        <th scope="col">اسم الملف</th>
                                                        <th scope="col">قام بالاضافة</th>
                                                        <th scope="col">تاريخ الاضافة</th>
                                                        <th scope="col">العمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0 ;?>
                                                    @foreach ( $attachment as $t )
                                                       <?php $i++ ; ?>
                                                       <tr>
                                                        <th>{{ $i }}</th>
                                                        <th>{{ $t->file_name }}</th>
                                                        <th>{{ $t->Created_by }}</th>
                                                        <th>{{ $involces->invoice_Date }}</th>

                                                        <th>

                                                            <a class="btn btn-outline-success btn-sm"
                                                            href="{{ url('View_file') }}/{{ $involces->invoice_number }}/{{ $t->file_name }}"
                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                            عرض</a>

                                                            @can('تحميل المرفق')


                                                            <a class="btn btn-outline-info btn-sm"
                                                            href="{{ url('View_tile') }}/{{ $involces->invoice_number }}/{{ $t->file_name }}"
                                                            role="button"><i class="fas fa-download"></i>;
                                                            تحميل</a>
                                                            @endcan



                                                            @can('حذف المرفق')



                                                           <button class="btn btn-outline-danger btn-sm " data-toggle="modal"
                                                                href="#modaldemo8">حذف</button>
                                                            @endcan




                                                        </th>
                                                    </tr>

                                                    @endforeach
                                                </tbody>

                                            </table>




                                    </div>
                                    @can('اضافة مرفق')


                                    <div class="card-body">
                                        <form action="{{ route('attachment_store') }} " method="POST" enctype="multipart/form-data"
                                            autocomplete="off">
                                            {{ csrf_field() }}
                                               <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                               <h5 class="card-title">المرفقات</h5>

                                                <input type="hidden" id="customFile" name="invoice_number"
                                                    value="{{ $involces->invoice_number }}">
                                               <input type="hidden" id="invoice_id" name="invoice_id"
                                                   value="{{ $involces->id }}">

                                                <div class="col-sm-12 col-md-12">
                                                 <input type="file" name="pic" id ="pic"class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                 required data-height="70" />
                                             </div><br>

                                             <div class="d-flex justify-content-center">
                                                 <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                             </div>


                                         </form>
                                  </div>
                                  @endcan


                                  <div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                     <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">حذف المرفق</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                       </button>
                                            </div>
                                        <form action="" method="post">

                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p class="text-center">
                                                    <h6 style="color:red"> هل انت متاكد من عملية حذف المرفق ؟</h6>
                                                    </p>

                                                    <input type="hidden" name="id_file" id="id_file" value="">
                                                    <input type="hidden" name="file_name" id="file_name" value="">
                                                    <input type="hidden" name="invoice_number" id="invoice_number" value="">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                                    <button type="submit" class="btn btn-danger">تاكيد</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
    </div>

                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

                    </div>
                    </div>

		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<!-- Internal Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Internal Input tags js-->
<script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
<!--- Tabs JS-->
<script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
<script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
<!--Internal  Clipboard js-->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
<!-- Internal Prism js-->
<script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>


@endsection
