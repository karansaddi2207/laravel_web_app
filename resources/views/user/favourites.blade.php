@extends('user.app')

@section('header_img')

    <div id="top_image" class="hide-on-med-and-up">
        <div class="row" style="margin-top:5px;">
            <div class="col l12 m12 s12" style="padding: 1px">
                <img src="{{ asset('user/img/homepage/img3.jpg') }}" id="west_image"> 
            </div>
        </div>
    </div>

@endsection

@section('main_content')



<div class="container hide-on-med-and-up" style="margin-bottom: 45px;">
    @foreach($lists as $list)
        <h5 id="westminster_fav">{{ $list->name }}</h5>
        <img src="{{ asset('user/img/favourites/'.$list->image) }}" id="west_image_part">
        <p class="center" style="color:red;font-weight: bold;">{{ $list->description }}</p>
        
    @endforeach
        <a href="#" class="modal-trigger" data-target="favourite_modal">
            <span class="fa fa-plus right" id="plus_icon"></span>
        </a>        
    
    </div>

    <div id="favourite_modal" class="modal hide-on-med-and-up">
        <h5 id="westminster_fav">Create a new list</h5>
            <form method="post" action="{{ route('user.favourites') }}" enctype="multipart/form-data">@csrf
                <div class="input-field">
                    <label for="list_name">List name</label>
                    <input type="text" name="list_name" required id="list_name">
                </div>
                <div class="input-field">
                    <label for="description">Description</label>
                    <input type="text" name="description" required id="description">
                </div>
                <div class="input-field">
                    
                    <input type="file" name="image" required id="image">
                </div>
                <button type="submit" id="submit_btn" class="btn waves-effect waves-light black">Submit</button>
            </form>
    </div>

@endsection

