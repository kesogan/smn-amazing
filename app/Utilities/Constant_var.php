<?php
namespace App\Utilities;
use App\Utilities\File_control;
use Illuminate\Support\Facades\Storage;

class Constant_var{
    public static function getImgPath(){
        $art_bd='storage/images/';
        $path=File_control::url_transform(public_path(),$art_bd);
        Storage::makeDirectory($path);
        return $path;
    }
    public static function getArtPath(){
        $art_bd='storage/images/art/';
        $path=File_control::url_transform(public_path(),$art_bd);
        Storage::makeDirectory($path);
        return $path;
    }
    public static function getEventPath(){
        $event_bd='storage/images/event/';
        $path=File_control::url_transform(public_path(),$event_bd);
        //File_control::create_rep($path);
        Storage::makeDirectory($path);
        return $path;
    }
    public static function getBdArtPath(){
        return 'storage/images/art/';
    }
    public static function getBdEventPath(){
        return 'storage/images/event/';
    }
}

?>
