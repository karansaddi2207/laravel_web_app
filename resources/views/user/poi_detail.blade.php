@extends('user.app')

@section('header_img')

<div id="top_image" class=" hide-on-med-and-up">
		<div class="row" style="margin-top:5px;">
			<div class="col l12 m12 s12" style="padding: 1px">
				<p id="point_para">
					<span>Points Of Interest Detail</span>
				</p>
				<img src="{{ asset('user/img/pois/'.$list->image) }}" id="west_image">	
			</div>
		</div>
	</div>

@endsection

@section('main_content')
	<div class="container hide-on-med-and-up" style="margin-bottom: 45px;">
		
		<span id="scenic">{{ $list->name }}</span>
		
		
		<p class="center" style="color:black;font-weight: bold;">{{ $list->description }}</p>

		

	</div>

@endsection