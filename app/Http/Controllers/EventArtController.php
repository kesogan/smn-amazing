<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\Event;
use Hamcrest\Text\IsEqualIgnoringCase;
use App\Models\Image;
use App\Models\Video;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use RecursiveDirectoryIterator as GlobalRecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use App\Utilities\File_control;
use App\Utilities\Constant_var;
use Illuminate\Support\Facades\Storage;

class EventArtController extends Controller
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
    $events=Event::orderBy('id')->get();
    $arts=Art::orderBy('id')->get();
    //dd($events);
    return view('dashboard\view\eventAndArtControle',compact('events','arts'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

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
  public function edit(Request $request)
  {

    $input = request()->all();
    $type=$input['type'];
    $id=(string)$input['id'];
    //dump($type);
        if(strcmp("'event'",$type)==0){
            $event=Event::find($id);
            return view('dashboard\forms\editEvent',compact('art','image','video'));
        }
        else if(strcmp("'art'",$type)==0){
            $art=Art::find($id);
            $image=Image::get()->where('imageable_id',$id);
            $video=Video::get()->where('art_id',$id);
           return view('dashboard\forms\editArt',compact('art','image','video'));
        }
            else dump($input);

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $input = request()->all();
    $type=$input['type'];
    $id=$input['id'];
    if(strcmp("'event'",$type)==0){
        $event=Event::find($id);
        $path=File_control::url_transform(public_path(),$event->url);
        if(!empty($path))
            //File_control::del_rep_file1(public_path($path));
            if(is_file($path))
                Storage::delete($path);
        Image::where('imageable_id',$id)
        ->andWhere('imageable_type','App\Models\Event')
        ->delate();
        Video::where('art_id',$id)->delate();
        Event::destroy($id);
    }else if(strcmp("'art'",$type)==0){
        $art=Art::find($id);
        $path=File_control::url_transform(public_path(),$art->url);
        if(!empty($path))
            //File_control::del_rep_file1(public_path($path));
            if(is_file($path))
                Storage::delete($path);
        Image::where('imageable_id',$id)
        ->andWhere('imageable_type','App\Models\Art')
        ->delate();
        Video::where('art_id',$id)->delate();
        $art->delate();
    }else echo "";

  }



}
