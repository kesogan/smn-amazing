<?php

namespace App\Utilities;
use Illuminate\Support\Facades\Storage;

class File_control{

  /**
   * Create the specified folder in the given path if not exist.
   *
   * @param  String Path
   * @return void
   */
  public static function create_rep($file)
  {
      if(!is_dir($file)){
          mkdir($file);
      }
  }
public static function fileUploadStorage($file,$object){
    $name=$file->getClientOriginalName();
    $path=Constant_var::getImgPath();
    $path=$path.''.$object;
    if(!empty($path)){
        Storage::makeDirectory($path);
        $path=File_control::url_transform('bla/bla',Storage::put($path, $file));
    }
    return $path;
}

public static function fileUploadStorageMove(){}

public static function fileDelateStorage($image){}
    /**
   * Arange the given path based to the operating system.
   *
   * @param  String Public_path, path_used
   * @return repaire_and_concatenated
   */

  public static function url_transform($public_path,$half_path)
  {
    if(sizeof(explode("/",$public_path))>1){
        if(sizeof(explode("\\",$half_path))>1){
            $half_path=str_replace("\\","/",$half_path);
            return $half_path;
        }else{
            return $half_path;
        }
    }elseif (sizeof(explode("\\",$public_path))>1) {
        if(sizeof(explode("/",$half_path))>1){
            $half_path=str_replace("/","\\",$half_path);
            return $half_path;
        }else{
            return $half_path;
        }
    }
    return '';
  }

  public static function url_transfor_concate($public_path,$half_path)
  {
    if(sizeof(explode("/",$public_path))>1){
        if(sizeof(explode("\\",$half_path))>1){
            $half_path=str_replace("\\","/",$half_path);
            return $public_path.'/'.$half_path;
        }else{
            return $public_path.'/'.$half_path;
        }
    }elseif (sizeof(explode("\\",$public_path))>1) {
        if(sizeof(explode("/",$half_path))>1){
            $half_path=str_replace("/","\\",$half_path);
            return $public_path.'\\'.$half_path;
        }else{
            return $public_path.'\\'.$half_path;
        }
    }
    return '';
  }

  public static function del_rep_file($file){
    $path=realpath($file);
    if (file_exists($path)) {
        //c'est un dossier
        if (is_dir($path)) {
            $dir=scandir($path,SCANDIR_SORT_DESCENDING);
            foreach ($dir as $file_in_dir) {
                if ($file_in_dir == '.' or $file_in_dir == '..') {
                    rmdir($path);//c'est un dossier vide : suppresion
                    break;
                }else{
                    //recursivité
                    del_rep_file($path.'/'.$file_in_dir);
                }
            }
        }else{
            //c'est un fichier
            unlink($path); //suppression du fichier
        }
    }else{echo '';}
  }

  public static function del_rep_file1($file)
  {
    $file_iterator=new GlobalRecursiveDirectoryIterator($file);
    $iterator=new RecursiveIteratorIterator($file_iterator,RecursiveIteratorIterator::CHILD_FIRST);
    //on Supprime a chaque dossier et chaque fichier du dossier cible
    foreach ($iterator as $files) {
        $files->is_dir() ? rmdir($files) : unlink($files);
    }
    //on supprime le rep meme
    rmdir($file);
  }

  public static function get_file_rep($file){
    $slash=explode("/",$file);
    $ant_slash=explode("\\",$file);
    $url='';
    $name='';
    if(sizeof($slash)>1){
        for ($i=0; $i <(sizeof($slash)-1) ; $i++) {
            if($i==0)
                $url=$slash[i];
            else
                $url=$url.'/'.$slash[i];
        }$name=$slash[i];
            return compact('url','name');
    }elseif (sizeof($ant_slash)>1) {
        for ($i=0; $i <(sizeof($ant_slash)-1) ; $i++) {
            if($i==0)
                $url=$slash[i];
            else
                $url=$url.'\\'.$slash[i];
        }
        $name=$slash[i];
            return compact('url','name');
    }return compact('url','name');
  }
}
