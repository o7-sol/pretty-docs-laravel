<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\ClickDocument;
use App\User;
use Carbon\Carbon;
use Auth;

class DocsController extends Controller
{
    public function displayAll(){
    	$docs = Document::orderBy('created_at', 'desc')->where('private', null)->take(50)->get();
        return view('docs', compact('docs'));
    }

    public function sortByClicks(){
        $docs = Document::orderBy('clicks', 'desc')->where('private', null)->take(50)->get();
        return view('byClicks', compact('docs'));
    }

    public function showDocument($hash){
    	$doc = Document::where('hash', $hash)->first();
    	$doc->clicks+=1;
    	$doc->update();

    	return view('doc', compact('doc'));
    }

    public function uploadDocument(Request $request){
    	$doc = new Document();
    	$doc->title = $request->title;
    	$doc->body = htmlentities($request->docText);
    	$doc->hash = str_random(8);
    	if(Auth::user()){
    		$doc->user_id = Auth::user()->id;
    	}
        if(isset($request->private)){
            $doc->private+=1;
        }
    	$doc->save();
    	$url = '/'.$doc->hash.'/'.$doc->id;
    	return redirect($url);
    }

    public function userDocs($name){
        $user = User::where('name', $name)->first();
        return view('users.docs', compact('user'));
    }

    public function userPrivateDocs($name){
        $user = User::where('name', $name)->first();
        if(Auth::user()->id == $user->id){
        return view('users.privateDocs', compact('user'));
        } else {
            return redirect()->back();
        }
    }

    public function deleteDoc($id){
        $doc = Document::where('id', $id)->first();
        if($doc->user_id == Auth::user()->id)
        {
        $doc->delete();
        return redirect()->back();
        }
        return redirect()->back();
    }
}
