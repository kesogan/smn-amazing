<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    use SoftDeletes;
    protected $table = 'video';
    public $timestamps = true;

}
