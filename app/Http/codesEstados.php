<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupCodes extends Model{
    protected $table = 'codesEstados';

	protected $fillable = ['code','value'];
}
