<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
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
    return view('mediaUpload');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request -> validate([
        'art' => 'required',
        'mediaType' => 'required'
    ],[
    'art.required' => 'you must chose an Art',
    'mediaType.required' => 'you must chose an dmedia Type'
    ]);
    if($request->hasfile('image')){
        $myImages=[];
        foreach ($request->file('image') as $image) {
            $name=$image->getClientOriginalName();
            $image->move(public_path('dashboard\assets\images\arts'),$name);
            $url='\dashboard\assets\images\arts\\'.''.$name;
            $img=new Image();
            $img['url']=$url;
            $img['alt']=$name;
            $myImages[]=$img;
        }
    }

    if(sizeof($myImages)>0){
        foreach ($myImages as $value) {
            $art1 = Art::fine();
            $art['id']=$art1['id']+1;
            $art->images()->save($value);
        }
    }
    $imageName = time().'.'.request()->image-> getClientOriginalExtension();
    request()->image->move(public_path('dashboard\assets\images\arts'), $imageName);

    return back()->with('succès','Vous avez chargé avec succès l\'image.')->with('image',$imageName);
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
  public function update($id)
  {

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

}

?>
