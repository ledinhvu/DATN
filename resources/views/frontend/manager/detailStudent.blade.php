@extends('frontend.layouts.app')

@section('title') | Chỉnh sửa tài khoản @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Chỉnh sửa tài khoản</h2>

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
                    @foreach($studentDetail as $studentDetail)
					<div id="about">
						<div class="title"><h3>Detail : {{ $studentDetail->name }} </h3></div>
                        @include('flash::message')
						{!! Form::open(['route' => 'editdetail.store', 'method' => 'post', 'id' => 'form']) !!}
							
							<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
								{!! Form::label('name', 'Name:(*)') !!}
								{!! Form::text('name', $studentDetail->name, ['class' => 'form-control']) !!}
								@if ($errors->has('name'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
							<!-- Current-Password Field -->
                            <div class="form-group {{ $errors->has('current-password') ? ' has-error' : '' }}">
                                {!! Form::label('current-password', 'Current-password:') !!}
                                {!! Form::password('current-password',['class' => 'form-control', 'type' => 'password']) !!}
                                @if ($errors->has('current-password'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('current-password') }}</strong>
									</span>
								@endif
                            </div>

                            <!-- New-Password Field -->
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('new-password', 'New-password:') !!}
                                {!! Form::password('new-password',['class' => 'form-control', 'type' => 'password']) !!}
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', $studentDetail->email, ['class' => 'form-control', 'readonly']) !!}
                            </div>
                            <!-- Phone Field -->
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!! Form::label('phone', 'Phone:') !!}
                                {!! Form::text('phone', $studentDetail->phone, ['class' => 'form-control']) !!}
                                @if ($errors->has('phone'))
									<span class="help-block">
										<strong style="color:red">{{ $errors->first('phone') }}</strong>
									</span>
								@endif
                            </div>
                            <!-- Address Field -->
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                {!! Form::label('address', 'Address:') !!}
                                {!! Form::text('address', $studentDetail->address, ['class' => 'form-control']) !!}
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
                    @endforeach	
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
