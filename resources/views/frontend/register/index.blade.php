@extends('frontend.layouts.app')

@section('title') | Register @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Register</h2>

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
						<div class="title"><h3>Register</h3></div>
						{!! Form::open(['route' => 'register1.store', 'method' => 'post', 'id' => 'form']) !!}
							
							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
								{!! Form::label('name', 'Name:(*)') !!}
								{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Name']) !!}
								@if ($errors->has('name'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								{!! Form::label('password', 'Password:(*)') !!}
								{!! Form::text('password', null, ['class' => 'form-control','placeholder' => 'Password']) !!}
								@if ($errors->has('password'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
								{!! Form::label('phone', 'Phone:(*)') !!}
								{!! Form::text('phone', null, ['class' => 'form-control','placeholder' => 'Phone']) !!}
								@if ($errors->has('phone'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								{!! Form::label('email', 'Email:(*)') !!}
								{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
								@if ($errors->has('email'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
								{!! Form::label('address', 'Address:(*)') !!}
								{!! Form::text('address', null, ['class' => 'form-control','placeholder' => 'Address']) !!}
								@if ($errors->has('address'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('address') }}</strong>
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