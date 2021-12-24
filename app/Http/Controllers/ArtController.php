<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Cart;
use App\Models\Image;
use App\Utilities\File_control;
use App\Utilities\Constant_var;
use Illuminate\Support\Facades\Storage;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ArtController extends Controller
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
    return view('dashboard/forms/addArt');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request -> validate([
        'name' => 'required|unique:art',
        'description' => 'required',
        'price' => 'required ',
        'quantity' => 'required ',
        'technique' => 'required | string',
        'equipment' => 'required | string',
        'support' => 'required | string',
        'image' => 'required',
        'image.*'=>'image|mimes :jpeg, png, jpg, gif, svg, PNG,JPG, PNG, JPEG, SVG|max: 2048'
    //mine : jpeg, png, jpg, gif, svg |

    ],[
    'name.required' => 'Name is required',
    'description.required' => 'description is required'
    ]);
    //'image' => 'required|image|mimes :jpeg, png, jpg, gif, svg, PNG|max: 2048'
    //mine : jpeg, png, jpg, gif, svg |
    $input = request()->all();
    $art=new Art();
    $art->name=$input['name'];
    $art->description=$input['description'];
    $art->quantity=$input['quantity'];
    $art->technique=$input['technique'];
    $art->equipment=$input['equipment'];
    $art->price=$input['price'];
    $art->support=$input['support'];
    $art->time=now()->toTimeString();
    //dd(7);
    if($request->hasfile('image')){
       // dd($request->file('image'));
        $myImages=[];
        foreach ($request->file('image') as $image) {
             $name=$image->getClientOriginalName();
            $url=File_control::fileUploadStorage($image,'art');
            if(!empty($url)){
                $img=new Image();
                $img->url=$url;
                $img->alt=$name;
                $myImages[]=$img;
            }

        }
    }
    $art->save();
    if(sizeof($myImages)>0){
        $lastArt = Art::latest()->first();
        foreach ($myImages as $value) {
            $lastArt->images()->save($value);
        }

    }

    return back()->with('success','Art added successfully')->with('image',$name);;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $art = Art::find($id);

    $related_arts = Art::inRandomOrder()->take(9)->get();

    Auth::check() ? $cart = Auth::user()->cart()->firstOrCreate([]) : $cart = null;

    return view('art-detail', compact('art', 'related_arts', 'cart'));
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
        'name' => 'required',
        'description' => 'required',
        'price' => 'required ',
        'quantity' => 'required ',
        'technique' => 'required | string',
        'equipment' => 'required | string',
        'support' => 'required | string',
        'image' => 'required',
        'image.*'=>'image|mimes :jpeg, png, jpg, gif, svg, PNG|max: 2048'

    ],[
    'name.required' => 'Name is required',
    'description.required' => 'description is required'
    ]);
    //'image' => 'required|image|mimes :jpeg, png, jpg, gif, svg, PNG|max: 2048'
    //mine : jpeg, png, jpg, gif, svg |
    $input = request()->all();
    $art=Art::find($input['id']);
    $art->name=$input['name'];
    $art->description=$input['description'];
    $art->price=$input['price'];
    $art->quantity=$input['quantity'];
    $art->technique=$input['technique'];
    $art->equipment=$input['equipment'];
    $art->support=$input['support'];
    if($request->hasfile('image')){
        $myImages=[];
        foreach ($request->file('image') as $image) {
            $name=$image->getClientOriginalName();
            $url=File_control::fileUploadStorage($image,'art');
            if(!empty($url)){
                $img=new Image();
                $img->url=$url;
                $img->alt=$name;
                $myImages[]=$img;
            }
        }
    }
    if(sizeof($myImages)>0){
        foreach ($myImages as $value) {
            $art->images()->save($value);
        }

    }
    $art->save();
    return back()->with('success','Art updated successfully')->with('image',$name);;
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
