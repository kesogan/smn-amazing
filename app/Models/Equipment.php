<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $table = 'equipment';
    public $timestamps = true;
    protected $fillable = array('name','description');

    public function arts()
    {
        return $this->belongsToMany('App\Models\Art', 'art_equipment');
    }
}
