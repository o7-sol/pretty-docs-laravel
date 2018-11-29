<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
    	'title', 'body', 'hash'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }


}
