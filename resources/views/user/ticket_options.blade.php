@extends('user.app')

@section('header_img')

	<div id="top_image" class="hide-on-med-and-up">
		<div class="row" style="margin-top:5px;">
			<div class="col l12 m12 s12" style="padding: 1px">
				<p id="ticket_para">
					<span>Ticket Options</span><br>
					Explore Tickets &amp; Packeages
				</p>
				<img src="{{ asset('user/img/homepage/img2.jpg') }}" id="west_image">	
			</div>
		</div>
			
	</div>

@endsection

@section('main_content')

<div class="container hide-on-med-and-up" style="margin-bottom: 45px;">
	@foreach($lists as $list)
		<a href="{{ route('user.ticket.booking',$list->id) }}"><h5 id="westminster_ticket">{{ $list->name }}</h5></a>
		<p id="price">${{ $list->price }}</p>
		<img src="{{ asset('user/img/tickets/'.$list->image) }}" id="west_image_part">
		<p class="center" style="color:black;font-weight: bold;">{{ $list->description }}</p>
	@endforeach
		

	</div>

@endsection