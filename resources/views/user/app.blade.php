<!DOCTYPE html>
<html>
<head>
	@include('user.layouts.head')
</head>
<body>

	@include('user.layouts.navbar')

	@include('user.layouts.for_small')

	@section('main_content')

		@show

	@include('user.layouts.footer')

	@if(count($errors)>0)

		@foreach($errors->all() as $error)

		<p class="alert alert-danger">
			@php

				echo "<script>M.toast({html:'$error'})</script>";

			@endphp

		</p>

		@endforeach

	@endif

	@if(Session::has('message'))
		<?php
			$msg = session('message');
			echo "<script>M.toast({html:'$msg'})</script>";
		?>
	@endif

</body>
</html>