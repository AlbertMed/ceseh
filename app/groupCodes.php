<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupCodes extends Model{
    protected $table = 'groupcodes';

	protected $fillable = ['code','value'];
}
