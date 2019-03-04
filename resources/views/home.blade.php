@extends('user.app')

@section('main_content')

<div id="top_image" class="hide-on-med-and-up">    
        <div class="row" style="margin-top:5px;">
            <div class="col l3 m4 s3" style="padding: 1px">
                    <img src="{{ asset('user/img/images1.jpg') }}" id="west_image">   
            </div>
            <div class="col l3 m3 s3" style="padding: 1px">
                <img src="{{ asset('user/img/images2.jpg') }}" id="west_image">
            </div>
            <div class="col l3 m4 s3" style="padding: 1px">
                    <img src="{{ asset('user/img/images3.jpg') }}" id="west_image">   
            </div>
            <div class="col l3 m3 s3" style="padding: 1px">
                <img src="{{ asset('user/img/images4.jpg') }}" id="west_image">
            </div>
        </div>
    </div>  

    <p class="hide-on-med-and-up">
        <h5 id="westminster">Westminster Fashion Week Festival</h5>
        <h6 id="date">21st - 24th February</h6>
    </p>

    <div class="hide-on-med-and-up">
                
        <a href="#" class="brand-logo left" id="brand_logo">&nbsp;&nbsp;&nbsp;Home</a><br>
        <div class="row" style="margin-top:5px;">
            <div class="col l6 m6 s6" style="padding: 0px">
                <img src="{{ asset('user/img/homepage/img3.jpg') }}" id="west_image1">
            </div>
            <div class="col l6 m6 s6" style="padding: 0px;">
                <img src="{{ asset('user/img/homepage/img1.jpg') }}" id="west_image1">
            </div>
        </div>s
        <div class="row" style="margin-top:-45px;">
            <div class="col l6 m6 s6" style="padding: 0px">
                <img src="{{ asset('user/img/homepage/img2.jpg') }}" id="west_image1">
            </div>
            <div class="col l6 m6 s6" style="padding: 0px">
                <img src="{{ asset('user/img/homepage/img4.jpg') }}" id="west_image1">
            </div>
        </div>

@endsection

