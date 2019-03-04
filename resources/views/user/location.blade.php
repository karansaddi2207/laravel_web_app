@extends('user.app')

@section('header_files')



@endsection

@section('main_content')

<div id="map" class="hide-on-med-and-up" style="width: 100%; height: 400px; background-color: gray;"></div>

@endsection

@section('footer_files')

<script type="text/javascript" src="{{ asset('user/js/googleMap.js') }}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1R1FYLrfYEdVGqVlhEC2HZ86PlhxAuFM&callback=loadMap">
    </script>

@endsection