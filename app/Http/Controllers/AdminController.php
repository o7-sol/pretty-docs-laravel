<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Auth;

class AdminController extends Controller
{
    public function deleteDoc($id){
    	$doc = Document::where('id', $id)->first();
    	if(Auth::user()->id == 1)
    		$doc->delete();
    		return redirect()->back();
    }
}
