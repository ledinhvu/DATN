<?php use App\Components\Util; ?>
@extends('frontend.layouts.app')

@section('title') | Student @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>
					@if(Session::has('users'))  
					Student : {{ Session::get('users')->name }}
					@endif
				</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
			<!--start: Row -->
	    	<div class="row">
		
				<div class="span8">
					
					<!-- start: About Us -->
					<div id="about">
						<div class="title"><h3>Danh sách các khóa học</h3></div>
						<ul class="title">
						@include('flash::message')
						@foreach($menus as $menu)
							<li>
								<a href="{{ route('viewCourse', $menu->id) }}" style="text-decoration: none">{{ $menu->name }}</a>
								<p>{!! Util::theExcerpt($menu->description, 150) !!}</p><br />
							</li>
						@endforeach
						</ul>
					</div>	
					<!-- end: About Us -->
				</div>	
				
				<div class="span4">
					
					<!-- start: Sidebar -->
					<div id="sidebar">

						<!-- start: Testimonials-->

						<div class="testimonial-container">

							<div class="title"><h3>Quản lý khóa học</h3></div>

								<div class="testimonials-carousel" data-autorotate="3000">

									<ul class="carousel">

										<li class="testimonial">
											<div class="testimonials">
                                                <ul class="title">
                                                  <li><a href="{{ route('viewRegister') }}" style="text-decoration: none">- Các khóa học đã đăng ký</a></li>
												  <li><a href="{{ route('learnEnglish') }}" style="text-decoration: none">- Các khóa đang học</a></li>
												  <li><a href="{{ route('feedback') }}" style="text-decoration: none">- Gửi phản hồi </a></li>
												  <li><a href="{{ route('detailStudent') }}" style="text-decoration: none">- Quản lý tài khoản </a></li>
												  <!--<li><a href="" style="text-decoration: none">- Thông tin của tôi</a></li>-->
                                                </ul>
                                            </div>
											<div class="testimonials-bg"></div>
										</li>

									</ul>

								</div>

							</div>

						<!-- end: Testimonials-->

					</div>
					<!-- end: Sidebar -->
					
				</div>
				
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->

	</div>
	<!-- end: Wrapper  -->	
@endsection

@section('scripts')

@endsection