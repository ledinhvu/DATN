@extends('frontend.layouts.app')

@section('title') | Feedback @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Feedback</h2>

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
						<div class="title"><h3>Feedback</h3></div>
                        @include('flash::message')
						{!! Form::open(['route' => 'feedback1.store', 'method' => 'post', 'id' => 'form']) !!}
							
							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
								{!! Form::label('title', 'Title:(*)') !!}
								{!! Form::text('title', null, ['class' => 'form-control','placeholder' => 'Title']) !!}
								@if ($errors->has('title'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('title') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}" style="with:600px">
								{!! Form::label('content', 'Content:(*)') !!}
								{!! Form::textarea('content', null, ['class' => 'form-control','placeholder' => 'Content', 'id' => 'feedback1-textarea']) !!}
								@if ($errors->has('content'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('content') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group col-sm-12">
								{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
								{{ Form::reset('Reset', ['class' => 'btn btn-default']) }}
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
