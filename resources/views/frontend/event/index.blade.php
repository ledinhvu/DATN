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
						<div class="title"><h3>{!! $event->title !!}</h3></div>
						<p>
						 <h4>@foreach($event->menus as $menu) 
								{!! $menu->name !!} 
							@endforeach</h4><br />
                            {!! $event->content !!}
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
                                                @foreach($events as $item)
                                                <li><a href="{!! route('event.show', [$item->id]) !!}" style=" text-decoration: none"> - {{ $item->title }}</a></li>
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