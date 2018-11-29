@extends('layouts.app')
@section('content')
        <div class="code-block">
        <h3>{{$doc->title}} <small>{{$doc->created_at}}</small></h3>
        <pre class="code"><xmp style="white-space: pre-wrap">
{!! html_entity_decode($doc->body) !!}
        </xmp></pre>
        </div>
@stop