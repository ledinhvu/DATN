@extends('frontend.layouts.app')

@section('title') | Event @endsection

@section('content')
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Event</h2>

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
						<div class="title"><h3>{!! $item->title !!}</h3></div>
						<p>
						<h4>@foreach($item->menus as $menu) 
								{!! $menu->name !!} 
							@endforeach</h4><br />
                            {!! $item->content !!}
						</p>
					</div>	
					<!-- end: About Us -->
				</div>	
				
				<div class="span4">
					
					<!-- start: Sidebar -->
					<div id="sidebar">

						<!-- start: Testimonials-->

						<div class="testimonial-container">

							<div class="title"><h3>Event</h3></div>

								<div class="testimonials-carousel" data-autorotate="3000">

									<ul class="carousel">

										<li class="testimonial">
											<div class="testimonials">
                                                <ul class="title">
                                                @foreach($event as $event)
                                                <li><a href="{!! route('event.show', [$event->id]) !!}" style=" text-decoration: none"> - {{ $event->title }}</a></li>
                                                @endforeach  
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