@extends('frontend.layouts.app')

@section('title') | Login @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Login</h2>

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
						<div class="title"><h3>Login</h3></div>
						@include('flash::message')
						{!! Form::open(['route' => 'login1.store', 'method' => 'post', 'id' => 'form']) !!}
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								{!! Form::label('email', 'Email:(*)') !!}
								{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
								@if ($errors->has('email'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								{!! Form::label('password', 'Password:(*)') !!}
								{!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => 'Password']) !!}
								@if ($errors->has('password'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>

							<div class="form-group col-sm-12">
								{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
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