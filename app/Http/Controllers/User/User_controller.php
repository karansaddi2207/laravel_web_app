<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Favourite;
use Illuminate\Support\Facades\Input;
use Image;
use App\Ticket;
use App\Poi;
use Illuminate\Support\Facades\Auth;

class User_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function favourites(Request $request)
    {
        if($request->isMethod('post'))
        {
            //return $request->all();

            $this->validate($request,[
                'list_name' => 'required',
                'description' => 'required|min:50'
            ]);

            $list = new Favourite;
            $list->name = $request->list_name;
            $list->description = $request->description;

            if($request->hasFile('image'))
            {
                $image_tmp = Input::file('image');
                if($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).".".$extension;
                    $image_path = 'user/img/favourites/'.$filename;

                    Image::make($image_tmp)->save($image_path);

                    $list->image = $filename;
                    //return redirect()->back()->with('flash_msg','Successfully Submitted');
                }
            }

            $list->save();

        }
        $lists = Favourite::all();
    	return view('user.favourites',compact('lists'));
    }

    public function location()
    {
    	return view('user.location');
    }

    public function ticket_options()
    {
        $lists = Ticket::all();
    	return view('user.ticket_options',compact('lists'));
    }

    public function point_of_interest()
    {
        $lists = Poi::all();
    	return view('user.point_of_interest',compact('lists'));
    }

    public function booking(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            //echo "<pre>";print_r($request->all());die;
            $total = $request->total;
            $val = explode(" ",$total);
            //echo $val[1];die;

            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_QY4jsEKRBOS1VUpRcrJZIMrj");

            // Create a Customer, if you want to make a subscriptions based site:
            $customer = \Stripe\Customer::create([
                'source' => 'tok_mastercard',
                'email' => Auth::user()->email,
            ]);

            // Charge the Customer instead of the card:
            $charge = \Stripe\Charge::create([
                'amount' => $val[1],
                'currency' => 'usd',
                'customer' => $customer->id,
            ]);

            // YOUR CODE: Save the customer ID and other info in a database for later.And whenever we want we can deduct amount from this account by calling below route
            //dd($customer->id);
            return redirect('/')->with('message','Payment is done');
        }
        $list = Ticket::where('id',$id)->first();
        return view('user.booking',compact('list'));
    }

    public function subscriptions($id)
    {
        // When it's time to charge the customer again, retrieve the customer ID.

        \Stripe\Stripe::setApiKey("sk_test_QY4jsEKRBOS1VUpRcrJZIMrj");

        $customer_id = 'cus_EMwyFkdGdPZ6uu';//fetch it from your stored database

        $charge = \Stripe\Charge::create([
            'amount' => 1500, // $15.00 this time
            'currency' => 'usd',
            'customer' => $customer_id, // fetch it from your database which we have stored above
        ]);

        dd('successfylly charged');
    }

    public function filter(Request $request)
    {
        //return $request->cat;
        $lists = Poi::where('cat_id',$request->cat)->get();
        $output = "";
        foreach($lists as $list)
        {
            $output .= "<span id='scenic'>".$list->name."</span>
                        <p id='abbey'>".$list->name."</p>
                        <a href='".route('user.poi_detail',$list->id) ."' style='cursor: pointer;'><img src='".asset('user/img/pois/'.$list->image)."' id='west_image'></a>
                        <p class='center' style='color:black;font-weight: bold;'>
                            ".$list->description."
                        </p>";
        }
        echo $output;
    }

    public function sort(Request $request)
    {
        //return $request->sort;
        $lists = Poi::orderBy('id',$request->sort)->get();
        $output = "";
        foreach($lists as $list)
        {
            $output .= "<span id='scenic'>".$list->name."</span>
                        <p id='abbey'>".$list->name."</p>
                        <a href='".route('user.poi_detail',$list->id) ."' style='cursor: pointer;'><img src='".asset('user/img/pois/'.$list->image)."' id='west_image'></a>
                        <p class='center' style='color:black;font-weight: bold;'>
                            ".$list->description."
                        </p>";
        }
        echo $output;
    }

    public function poi_detail($id)
    {
        $list = Poi::where('id',$id)->first();
        return view('user.poi_detail',compact('list'));
    }

}
