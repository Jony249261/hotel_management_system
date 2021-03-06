@extends('frontlayout')
@section('content')
	<!-- Slider Section Start -->
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
	  	
	    
	    
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- Slider Section End -->


	<!-- Service Section End -->
	<!-- Gallery Section Start -->
	<div class="container my-4">
		<h1 class="text-center border-bottom" id="gallery">Gallery</h1>
		<div class="row my-4">
			@foreach($roomTypes as $rtype)
			<div class="col-md-3">
				<div class="card">
					<h5 class="card-header">{{$rtype->title}}</h5>
					<div class="card-body">
						@foreach($rtype->roomtypeimgs as $index => $img)
                        	<a href="{{asset('image/'.$img->img_src)}}" data-lightbox="rgallery{{$rtype->id}}">
                        		@if($index > 0)
                        		<img class="img-fluid hide" src="{{asset('image/'.$img->img_src)}}" />
                        		@else
                        		<img class="img-fluid" src="{{asset('image/'.$img->img_src)}}" />
                        		@endif
                        	</a>
                        </td>
                        @endforeach
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- Gallery Section End -->

	<!-- Slider Section Start -->
	<h1 class="text-center mt-5" id="gallery">Testimonials</h1>

	  <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
	  </button>
	</div>
	<!-- Slider Section End -->

<!-- LightBox css -->
<link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/lightbox2-2.11.3/dist/css/lightbox.min.css" />
<!-- LightBox Js -->
<script type="text/javascript" src="{{asset('vendor')}}/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>
<style type="text/css">
	.hide{
		display: none;
	}
</style>
@endsection
</body>
</html>