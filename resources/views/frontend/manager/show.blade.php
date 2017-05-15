@extends('frontend.layouts.app')

@section('title') | Menus @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Menus</h2>

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
						<div class="title"><h3>Menus</h3></div>
						<h4>
                            {!! $item->name !!}
						</h4>
						<p>
                            {!! $item->description !!}
						</p>
						{!! Form::open(['route' => ['registerCourse', $item->id], 'method' => 'post']) !!}
						<div class="form-group col-sm-12">
							{!! Form::submit('Đăng ký', ['class' => 'btn btn-primary']) !!}	
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