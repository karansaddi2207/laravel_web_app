@extends('user.app')

@section('header_img')

	<div id="top_image" class="hide-on-med-and-up">
		<div class="row" style="margin-top:5px;">
			<div class="col l12 m12 s12" style="padding: 1px">
				<p id="point_para">
					<span>Points Of Interest</span>
				</p>
				<img src="{{ asset('user/img/homepage/img2.jpg') }}" id="west_image">
			</div>
		</div>
	</div>

@endsection

@section('main_content')

<div class="container hide-on-med-and-up" style="margin-bottom: 45px;">
		<h6 id="poi_h">Westminster is the bustling government area near Bucklingam Palace.</h6>

		<div id="select_filter">
			<select id="filter" style="display: block">
				<option selected disabled>Filter By</option>
				<option value="1">Festival</option>
				<option value="2">Function</option>
			</select>

			<select id="sort" style="display: block">
				<option selected disabled>Sort By</option>
				<option value="ASC">Ascending</option>
				<option value="DESC">Descinding</option>
			</select>
		</div>

		
		
		<div id="data">
		
		@foreach($lists as $list)
			<span id="scenic">{{ $list->name }}</span>
			<p id="abbey">{{ $list->name }}</p>
			<a href="{{ route('user.poi_detail',$list->id) }}" style="cursor: pointer;"><img src="{{ asset('user/img/pois/'.$list->image) }}" id="west_image"></a>
			<p class="center" style="color:black;font-weight: bold;">
				{{ $list->description }}
			</p>
			<!--for ajax request-->
			
		@endforeach
		</div>
		
	{{ csrf_field() }}	
		

	</div>

@endsection

@section('footer_files')

<script type="text/javascript">
	
	$('#filter').change(function(){

				var cat = $('#filter').val();
				//alert(cat);

				$.ajax({
					type : 'ajax',
					method : 'POST',
					url : 'filter',
					data : {'cat':cat,'_token':$('input[name=_token]').val()},
					success : function(data)
					{//console.log(data);
						//alert(data);
						$('#data').html(data);
					},
					error : function(data){
						console.log(data);
						//alert(data);
					}

				});

			});

	$('#sort').change(function(){

				var sort = $('#sort').val();
				//alert(sort);

				$.ajax({
					type : 'ajax',
					method : 'POST',
					url : 'sort',
					data : {'sort':sort,'_token':$('input[name=_token]').val()},
					success : function(data)
					{
						//console.log(data);
						$('#data').html(data);
					},
					error : function(data){
						console.log(data);
						//alert(data);
					}

				});

			});

</script>

@endsection