<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Art;

class MediaController extends Controller
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
    return view('dashboard\forms\mediaUpload');
  }
//run this now;
//nmp install
//npm run dev
  public function auto_complet(Request $request)
  {
    if($request->get('query'))
    {
    $keyword=$request->get('query');
    $keyword="%{$keyword}%";
    $keyword=Art::whereName('like',$keyword)->get();
    //return response()->json($keyword);

    //  $query = $request->get('query');
    //  $data = DB::table('apps_countries')
    //    ->where('country_name', 'LIKE', "%{$query}%")
    //    ->get();
     $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
     foreach($keyword as $row)
     {
      $output .= '<li><a href="#">'.$row->name.'</a></li>';
     }
     $output .= '</ul>';
     echo $output;
    }


    // $arts=[];
    // if(!empty($keyword)){
    //     foreach ($keyword as $art) {
    //         $arts->array_push($art->name.'//'.$art->description.'//'.$art->id);
    //     }
    // }
    // echo json_encode($arts);
    //return view('dashboard\forms\mediaUpload');
  }
}
