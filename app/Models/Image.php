<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    use SoftDeletes;
    protected $table = 'image';
    public $timestamps = true;
    protected $fillable = array('url', 'alt');

    public function imageable()
    {
        return $this->morphTo();
    }

    /*
     * This function is to retrive a full path of images
     * User avatar image src
     */
    public function getImageSrcAttribute() {


        if($this->imageable_type == 'App\Models\Art' ){
            // just to prevent unexisting file
            if(!file_exists(public_path('storage/images/arts/' . $this->url)))
            {
                $this->update(['url' => 'default_art.jpg']);
            }

            return asset("storage/images/arts/" . $this->url);
        }

        else if($this->imageable_type == 'App\Models\Event') {
            // just to prevent unexisting file
            if(!file_exists(public_path('storage/images/events/' . $this->url)))
            {
                $this->update(['url' => 'default_event.jpg']);
            }

            return asset("storage/images/events/" . $this->url);
        }

        else if($this->imageable_type == 'App\User') {
            // just to prevent unexisting file
            if(!file_exists(public_path('storage/images/users/' . $this->url)))
            {
                $this->update(['url' => 'default.png']);
            }

            return asset("storage/images/users/" . $this->url);
        }
        else {
            // just to prevent unexisting file
            if(!file_exists(public_path('storage/images/' . $this->url)))
            {
                $this->update(['url' => 'default_others.jpg']);
            }

            return asset("storage/images/others/" . $this->url);
        }
    }
}
