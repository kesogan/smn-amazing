<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Art extends Model
{
    use SoftDeletes;


    use SoftDeletes;
    protected $table = 'art';
    public $timestamps = true;
    protected $fillable = array('name', 'description', 'price', 'quantity', 'start_at', 'end_at', 'type');

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'art_id');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('quantity', 'sell_price');
    }

    public function cart_items()
    {
        return $this->hasMany('App\Models\CartItem');
    }

    public function equipments()
    {
        return $this->belongsToMany('App\Models\Equipment', 'art_equipment')
            ->withTimestamps();
    }

    public function techniques()
    {
        return $this->belongsToMany('App\Models\Technique', 'art_technique')
            ->withTimestamps();
    }

    public function supports()
    {
        return $this->belongsToMany('App\Models\Support', 'art_support')
            ->withTimestamps();
    }

}
