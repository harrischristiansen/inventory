<?php
/*
	Photo Model
	File created by Harris Christiansen (HarrisChristiansen.com)
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
	use SoftDeletes;
	
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

}
