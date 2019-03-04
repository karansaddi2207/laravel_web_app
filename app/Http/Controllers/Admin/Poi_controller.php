<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poi;
use Image;
use Illuminate\Support\Facades\Input;
use App\Category;

class Poi_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Poi::all();
        return view('admin.pois.poi',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('admin.pois.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $poi = new Poi;
        $poi->name = $request->name;
        $poi->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            if($file->isValid())
            {
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(111,99999).".".$extension;

                $img = 'user/img/pois/'.$fileName;

                Image::make($file)->save($img);

                $poi->image = $fileName;
            }
        }
        $poi->cat_id = $request->category;
        $poi->save();
        return redirect(route('poi.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lists = Poi::where('id',$id)->first();
        return view('admin.pois.edit',compact('lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $ticket = Poi::find($id);
        $ticket->name = $request->name;
        $ticket->description = $request->description;
        if($request->hasFile('image'))
        {
            $file = Input::file('image');
            if($file->isValid())
            {
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11,99999).".".$extension;
                $img = 'user/img/pois/'.$fileName;
                Image::make($file)->save($img);

                $ticket->image = $fileName;
            }
        }
        $ticket->save();
        return redirect(route('poi.index'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Poi::where('id',$id)->first();
        $image_path = 'user/img/pois/'.$image->image;
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        Poi::where('id',$id)->delete();
        return redirect()->back();
    }
}
