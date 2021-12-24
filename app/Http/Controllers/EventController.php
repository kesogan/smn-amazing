<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Art;
use App\Utilities\Constant_var;
use App\Utilities\File_control;
use App\Utilities\UsefullMethods;
use SebastianBergmann\Environment\Console;
use App\Models\Image;

class EventController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('dashboard\forms\addEvent');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request -> validate([
        'name' => 'required|unique:event',
        'date' => 'required',
        'description'=>'required',
        'user'=>'required',
        'image' => 'required',
        'image.*'=>'image|mimes :jpeg, png, jpg, gif, svg, PNG,JPG, PNG, JPEG, SVG|max: 2048'
    ],[
    'name.required' => 'Name is required',
    'date.required' => 'date is required',
    'user.required'=>'use id is required'
    ]);

    $input = request()->all();
    $event=new Event();
    $event->name=$input['name'];
    $event->date=$input['date'];
    $event->description=$input['description'];
    $event->user_id=$input['user'];
    //$event['time']=now()->toTimeString();
    dd($event);
    $event->save();
    if($request->hasfile('image')){
       //dd($request->file('image'));
        $myImages=[];
        foreach ($request->file('image') as $image) {
            $name=$image->getClientOriginalName();
            //dd($name);
            //$path=Constant_var::getEventPath();
            $url=File_control::fileUploadStorage($image,'event');
            //dd($url);
            if(!empty($url)){
                $img=new Image();
                $img->url=$url;
                $img->alt=$name;
                $myImages[]=$img;
            }
        }
    }

    if(sizeof($myImages)>0){
        $event = Event::latest()->first();
        foreach ($myImages as $image) {
            $event->images()->save($image);
        }
       // dd($myImages);
    }
    //dd($myImages);
   return back()->with('success','Event updated successfully')->with('image',$name);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
    $request -> validate([
        'name' => 'required|unique:event',
        'date' => 'required',
        'user'=>'required',
        'image' => 'required',
        'image.*'=>'image|mimes :jpeg, png, jpg, gif, svg, PNG,JPG, PNG, JPEG, SVG|max: 2048'

    ],[
    'name.required' => 'Name is required',
    'date.required' => 'date is required'
    ]);
    $input = request()->all();
    $event=Event::find($input['id']);
    $event->name=$input['name'];
    $event->date=$input['date'];
    $event->description=$input['description'];
    $event->user_id=$input['user'];
    //$event['time']=now()->toTimeString();
    $event->save();
    if($request->hasfile('image')){
        $myImages=[];
        foreach ($request->file('image') as $image) {
            $name=$image->getClientOriginalName();
            $url=File_control::fileUploadStorage($image,'event');
            if(!empty($url)){
                $img=new Image();
                $img->url=$url;
                $img->alt=$name;
                $myImages[]=$img;
            }
        }
    }
    if(sizeof($myImages)>0){
        foreach ($myImages as $image) {
            $event->images()->save($image);
        }

    }
    $events=Event::orderBy('id')->get();
    $arts=Art::orderBy('id')->get();
    return view('dashboard\view\eventAndArtControle',compact('events','arts'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

  public function search(Request $request)
  {
    if($request->get('query'))
    {
        $keyword=$request->get('query');
        UsefullMethods::auto_complet($keyword,"user",['firstName','lastName','phoneNumber','email']);
    }
  }

}

?>
