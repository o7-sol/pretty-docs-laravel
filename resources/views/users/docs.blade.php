@extends('layouts.app')
@section('content')
<small><span style="font-size: 12px; color: red">|{{$user->name}} documents</span></small>
    <table class="table table-list-search" style="width: 80%;margin: 0px auto;">
                    <thead style="padding-left: 5px;background-color: #1d202f;">
                        <tr>
                            <th>
                            <input id="system-search" name="q" placeholder="Search for" required>
                            <br>
                            Title</th>
                            <th></th>
                            <th></th>
                            <th>Date Added <i class="fa fa-arrow-up" aria-hidden="true" style="color:#02fd02"></i></th>
                            <th>Clicks <i class="fa fa-arrow-up" aria-hidden="true" style="color:#02fd02"></i></th>
                            @if(Auth::user() && Auth::user()->id == $user->id)
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody style="text-align: left;background-color: #ececec;">
                    @foreach($user->document as $doc)
                        @if($doc->private == 0)
                    <tr style="color: black;">
                            <td style="color: black;">

                            <i class="fa fa-globe"></i>
                            <a href="/{{$doc->hash}}/{{$doc->id}}" style="color: black; font-weight: bold;">{{$doc->title}}
                            </a>

                            </td>
                            <td></td>
                            <td></td>
                            <td>{{$doc->created_at->toDateString()}}</td>
                            <td>{{$doc->clicks}}</td>
                            @if(Auth::user() && Auth::user()->id == $user->id)
                            <td><a href="/delete/doc/{{$doc->id}}">Delete</a></td>
                            @endif                                  
                        </tr>
                        @endif
                    @endforeach                                         
                    </tbody>
                </table>
@stop