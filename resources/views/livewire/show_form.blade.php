@extends('layouts.master')
@section('title')
{{ trans('main_side.parent_add') }}
@stop
@section('css')
@livewireStyles
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('main_side.parent') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ trans('main_side.parent_add') }}</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <livewire:add-parent />
								
								
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
@livewireScripts
@endsection