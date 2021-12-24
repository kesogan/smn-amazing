<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tatouage extends Model
{
    use SoftDeletes;
    protected $table = 'tatouages';
    public $timestamps = true;
    protected $fillable = array('name','description');

}
