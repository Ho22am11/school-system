<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}">
                            <span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">{{trans('main_side.school_system')}}</li>

					<li class="slide">
						<a class="side-menu__item"  href="{{ url('/dashboard') }}"><i class="fa-solid fa-user-vneck"></i>{{ trans('main_side.Dashboard') }}</a>
					  
					</li>				

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.Grade')}}</a>
				   <ul class="slide-menu">
						
					<li><a class="slide-item" href="{{ url('/' . $page='grade') }}">{{ trans('main_side.grade_list')}}</a></li>
  
					</ul>
				</li>
					

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.classrooms')}}</a>
					   <ul class="slide-menu">

						<li><a class="slide-item" href="{{ url('/' . $page='classroom') }}">{{ trans('main_side.classrooms_list')}}</a></li>

						</ul>
					</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.section')}}</a>
					   <ul class="slide-menu">

						<li><a class="slide-item" href="{{ url('/' . $page='section') }}">{{trans('main_side.section_list')}}</a></li>

						</ul>
					</li>

					
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.parent')}}</a>
					   <ul class="slide-menu">

						<li><a class="slide-item" href="{{ url('/show_form') }}">{{trans('main_side.parent_add')}}</a></li>
                     
                          
					   <li><a class="slide-item" href="{{ url('/' . $page='roles') }}">{{trans('main_side.parent_list')}}</a></li>

						</ul>
					</li>
                  

					  <!-- Teachers-->

					  <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.teacher')}}</a>
                       <ul class="slide-menu">
                            
							<li><a class="slide-item" href="{{  url('/' . $page='teacher')}}">{{trans('main_side.parent_add')}}</a></li>
                     
                          
							<li><a class="slide-item" href="{{ url('/' . $page='roles') }}">{{trans('main_side.parent_list')}}</a></li>
                       

						</ul>
                    </li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{ trans('main_side.studants')}}</a>
					   <ul class="slide-menu">
							
						<li><a class="slide-item" href="{{ route('student.create')}}">{{ trans('main_side.add_studant')}}</a></li>
					 
						  
						<li><a class="slide-item" href="{{ route('student.index') }}">{{ trans('main_side.student_list')}}</a></li>

						<li><a class="slide-item" href="{{ route('promotion.index') }}">{{ trans('main_side.student_promotions')}}</a></li>
				   
						<li><a class="slide-item" href="{{ route('promotion.create') }}">{{ trans('main_side.management_promotions')}}</a></li>

						</ul>
					</li>
	
				<!-- Teachers-->



				<li class="slide">
				  <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.graduated')}}</a>
				 <ul class="slide-menu">
					  
					  <li><a class="slide-item" href="{{ route('graduated.create') }}">{{trans('main_side.graduated_add')}}</a></li>
			   
					
					  <li><a class="slide-item" href="{{ url('/' . $page='graduated') }}">{{trans('main_side.graduated_list')}}</a></li>
				 

				  </ul>
			  </li>

			  <!-- accounts-->


				<li class="slide">
				  <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('fees.school_expenses')}}</a>
				 <ul class="slide-menu">
					  
					  <li><a class="slide-item" href="{{ route('fee.index') }}">{{trans('fees.school_expenses')}}</a></li>
			   
					
					  <li><a class="slide-item" href="{{ route('fee_invoices.index') }}">{{trans('main_side.invoices')}}</a></li>

					  <li><a class="slide-item" href="{{ route('recepit_student.index') }}">{{trans('students.receipt')}}</a></li>

					  <li><a class="slide-item" href="{{ route('processing_fee.index') }}">{{trans('students.Exemption_fee')}}</a></li>

					  <li><a class="slide-item" href="{{ route('payment_student.index') }}">{{trans('students.Expenditure_voucher')}}</a></li>
				 

				  </ul>
			  </li>

			  <!-- attendances-->



				<li class="slide">
				  <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.attendances')}}</a>
				 <ul class="slide-menu">
					  
					  <li><a class="slide-item" href="{{ route('attendances.index') }}">{{trans('main_side.section_list')}}</a></li>
			   

				  </ul>
			  </li>

			   <!-- subjects-->

				<li class="slide">
				  <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.subject')}}</a>
				 <ul class="slide-menu">
					  
					  <li><a class="slide-item" href="{{ route('subjects.index') }}">{{trans('main_side.subject')}}</a></li>
			   

				  </ul>
			  </li>

			     <!-- exam -->

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.exam')}}</a>
				   <ul class="slide-menu">
						
						<li><a class="slide-item" href="{{ route('exams.index') }}">{{trans('main_side.exam')}}</a></li>
				 
  
					</ul>
				</li>

				  <!-- quizzes -->

				  <li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa-solid fa-user-vneck"></i>{{trans('main_side.quizzes')}}</a>
				   <ul class="slide-menu">
						
						<li><a class="slide-item" href="{{ route('quizzes.index') }}">{{trans('main_side.quizzes')}}</a></li>
						<li><a class="slide-item" href="{{ route('questions.index') }}">{{trans('main_side.queastions')}}</a></li>
				 
  
					</ul>
				</li>

					
					
				       
 
					
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
