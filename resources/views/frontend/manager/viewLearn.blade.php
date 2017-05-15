@extends('frontend.layouts.app')

@section('title') | Danh sách khóa học @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Khóa học</h2>

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
						<div class="title"><h3>Danh sách bài học </h3></div>
						@include('flash::message')
						@foreach($view_learn as $view_learn)
                        <h4><a href="{{ route('viewLesson', $view_learn->id_lesson) }}" style="text-decoration:none">
                            {{ $view_learn->name }}
						</a></h4><br />
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