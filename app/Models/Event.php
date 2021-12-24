<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    use SoftDeletes;
    protected $table = 'event';
    public $timestamps = true;
    protected $fillable = array('name', 'date', 'description');

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'art_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
