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
            <h3 id="reg_with_us">Sign Up</h3>
            <div class="row">
                <div class="input-field">
                    <input required id="first_name" value="{{ old('email') }}" name="email" type="text" class="validate">
                    <label for="first_name">E-Mail</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-field">
                    <input required id="last_name" name="name" type="text">
                    <label for="last_name">Username</label>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input required id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input required id="confirm" name="password_confirmation" type="password" class="validate">
                    <label for="confirm">Cofirm Password</label>
                </div>
            </div>
            <div class="row" id="reg_btn">
                <button type="submit" id="reg_btn" class="btn waves-effect waves-light black left">Register</button>
            </div>
        </form>
                    
    </div>

@endsection
