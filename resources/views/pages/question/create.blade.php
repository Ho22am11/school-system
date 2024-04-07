@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
{{ trans('main_side.queastions')}}
   
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('main_side.queastions')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="post"  autocomplete="off" >
                    
                        @csrf
                        <div class="row">
                            
                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('question.question') }} </label>
                                <input type="text" name="name" class="form-control" autofocus>
                            </div>

                           
                        </div><br>

                        <div class="row">
                        <div class="col">
                            <label for="title">{{ trans('question.answares') }}</label>
                            <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                      rows="4"></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{ trans('question.answare_right') }}</label>
                            <input type="text" name="right_answer" id="input-name"
                                   class="form-control form-control-alternative" autofocus>
                        </div>
                    </div>

                        <div class="row">

                            <div class="col">
                                <label for="inputName" class="control-label"> {{ trans('question.quizze')}}</label>
                                <select id="quizze_id" name="quizze_id" class="form-control">   
                                    @foreach ($quizzes as $quizze)
                                        <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                    @endforeach
                                 
                                </select>
                            </div>

                            <div class="col">
                                <label for="title">{{ trans('question.score')}}</label>
                                <input type="text" name="score" id="score"
                                       class="form-control form-control-alternative" autofocus>
                            </div>



                         
                        </div><br>
   
                       
                    
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary"> {{ trans('parent.Finish') }}</button>
                        </div>


                    </form>
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