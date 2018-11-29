<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClickDocument extends Model
{
    protected $fillable = [
    'doc_id'
    ];

    public function document()
    {
    	return $this->hasMany('App\Document');
    }
}
