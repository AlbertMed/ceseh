<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estados extends Model{
    protected $table = 'codesestados';

	protected $fillable = ['code','value'];
}
