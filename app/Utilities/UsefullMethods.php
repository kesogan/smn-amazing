<?php
namespace App\Utilities;
use App\Utilities\File_control;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\Art;
use App\User;
use App\Models\Order;

class UsefullMethods{
    public static function testThree($mail1,$mail2,$mail3){
        if($mail1==$mail2){
            if($mail2==$mail3)
                return array($mail1);
            else return array($mail1,$mail3);
        }elseif($mail1==$mail3){
            return array($mail1,$mail2);
        }elseif($mail2==$mail3){
            return array($mail1,$mail2);
        }else return array($mail1,$mail2,$mail3);
    }
    public static function getImgPath(){

        $art_bd='storage/images/';
        $path=File_control::url_transform(public_path(),$art_bd);
        Storage::makeDirectory($path);
        return $path;
    }

    public static function auto_complet($keyword,String $model,$atribsTable)
    {

        $keyword="%{$keyword}%";
//dd(strcmp('user',$model));
      if(strcmp('art',$model)==0){
        $keyword=Art::whereName('like',$keyword)->get();
       // dd('$keyword');

      }elseif (strcmp('event',$model)==0) {
        dd('125');
        $keyword=Event::whereName('like',$keyword)->get();
      }
      elseif (strcmp('user',$model)==0){
        $keyword=User::where('firstName','like',$keyword)
        ->orWhere('lastName','like',$keyword)
        ->orWhere('email','like',$keyword)
        ->get();
    }
      elseif(strcmp('order',$model)==0){
        $keyword=Order::whereName('like',$keyword)->get();
      }else {
          dd('12');
      }
      //dd('1');
       $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
       $midle='';
       foreach($keyword as $row)
       {
           foreach ($atribsTable as $attribs) {
            $midle .= $row->$attribs.' , ';
           }
           $output .= '<li id='.$row->id.'><a href="'.$row->id.'">'.$midle.'</a></li>';
       }
       $output .= '</ul>';
      // dd($output);
       echo $output;
    }


}

?>
