<?php use App\Components\Util; ?>
@extends('frontend.layouts.app')
	
@section('content')
	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2 style="font-family:tahoma">Trung tâm Olympia</h2>
				<p style="font-family:tahoma">NGOẠI NGỮ QUỐC TẾ OLYMPIA ĐÀO TẠO TIẾNG ANH VỚI 100% GIÁO VIÊN NƯỚC NGOÀI CHO CÁC LỨA TUỔI VÀ TRÌNH ĐỘ</p>
				<div class="da-img"><img style="height:320px" src="http://localhost:8080/olympia/public/frontend/img/parallax-slider/slide1.png" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<h2 style="font-family:tahoma">Những khóa học</h2>
				<p style="font-family:tahoma">+ Tiếng Anh cho các cháu từ 3 - 22 tuổi;<br />
					+ Tiếng Anh giao tiếp, Du học, XKLĐ, DN...<br />
					+ Luyện thi: HSG, IELTS, TOEIC, B1, B2, C1...<br />
					+ Lớp tiếng Anh đặc biệt 1 thầy – 1 trò.</p>
				<div class="da-img"><img style="height:320px" src="http://localhost:8080/olympia/public/frontend/img/parallax-slider/slide2.png" alt="image02" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
      		<div class="row">
			  	@foreach($categories as $catalog)
        		<div class="span4">
          			<div class="icons-box">
						<i class="ico-ok circle big"></i>
						<div class="title"><h3>
							<a href="{{ route('catalog.filter', $catalog->id) }}" style="text-decoration:none;color:#666666">{{ $catalog->name }}</a>
						</h3></div>
						<div class="clear"></div>
					</div>
        		</div>
				@endforeach
      		</div>
			<!-- end: Row -->
      		
			<hr>
		
			<hr>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">
					@foreach($news as $new)
					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3><a href="{{ route('new.filter', $new->id) }}" style="text-decoration:none;color:#666666">{!! $new->title !!}</a></h3>
								<p>{{ Util::theExcerpt($new->content, 100) }}</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->
					@endforeach
				</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
			<hr>
			
		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->			
@endsection
   
