@extends('frontend.layouts.app')

@section('title') | Các khóa học đã đăng ký @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Các khóa học đã đăng ký</h2>

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
						<div class="title"><h3>Danh sách khóa học</h3></div>
						@foreach($view_regis as $view_regis)
						<h4>{{ $view_regis->name }}</h4><br />
						
						<div class="form-group col-sm-12">
						<!--{!! Form::submit('Thanh toán', ['class' => 'btn btn-primary']) !!}	-->
						<a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=dinhvu12t3bkdn@gmail.com&product_name={{$view_regis->id}}&comments={{$view_regis->name}}&price={{ $view_regis->cost }}&return_url=http://localhost:8080/olympia/public/transaction&type=success">
							<img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" />
						</a>
						</div>
						
						@endforeach
						{!! Form::open(['route' => ['comeback'], 'method' => 'post']) !!}
						<div class="form-group col-sm-12">
							{!! Form::submit('Back', ['class' => 'btn btn-primary']) !!}	
						</div>
						{!! Form::close() !!}
					</div>	
					<!-- end: About Us -->
				</div>	
				
				<div class="span4">
					
					<!-- start: Sidebar -->
					<div id="sidebar">
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