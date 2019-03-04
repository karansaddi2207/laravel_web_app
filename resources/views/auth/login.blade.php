@extends('user.app')

@section('header_img')

    <div id="top_image" class="hide-on-med-and-up">
        <div class="row" style="margin-top:5px;">
            <div class="col l12 m12 s12" style="padding: 1px">
                <img src="{{asset('user/img/homepage/img3.jpg') }}" id="west_image"> 
            </div>
            
        </div>
    </div>

@endsection

@section('main_content')

<div class="container center hide-on-med-and-up">
        
        <form action="#" method="post" class="center" id="form1">@csrf
            <h3 id="reg_with_us">LogIn</h3>
            <div class="row">
                <div class="input-field">
                    <input id="first_name" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="first_name">Email</label>
                    
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <label for="password">Password</label>
                    
                </div>
            </div>
            <div class="row" id="reg_btn">
                <button type="submit" id="reg_btn" class="btn waves-effect waves-light black left">LogIn</button>
            </div>
        </form>

        <p class="center">OR</p>

        <a href="{{ route('user.login','facebook') }}"><img id="social_btn" src="{{ asset('user/img/social/img1.png') }}"></a>

        <p class="center">OR</p>

        <a href="{{ route('user.login','google') }}"><img id="social_btn1" src="{{ asset('user/img/social/img2.png') }}"></a>

        <br><br>
                    
    </div>
    
@endsection
