<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eqquipment extends Model
{
    use SoftDeletes;
    protected $table = 'eqquipments';
    public $timestamps = true;
    protected $fillable = array('name','description');
}
