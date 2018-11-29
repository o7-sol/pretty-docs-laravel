@extends('layouts.app')
@section('content')
    <table class="table table-list-search" style="width: 80%;margin: 0px auto;">
                    <thead style="padding-left: 5px;background-color: #ff9900;">
                        <tr>
                            <th>
                            <input id="system-search" name="q" placeholder="Search for" required>
                            <br>                            
                            Title</th>
                            <th></th>
                            <th></th>
                            <th>Date Added <a href="/"><i class="fa fa-arrow-down" aria-hidden="true" style="color:#02fd02"></i></a></th>
                            <th>Clicks <i class="fa fa-arrow-up" aria-hidden="true" style="color:#02fd02"></i></th>
                            <th>Author</th>
                            @if(Auth::user() && Auth::user()->id == 1)
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody style="text-align: left;background-color: #ececec;">
                    @foreach($docs as $doc)
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
                           @if($doc->user_id == 0)
                            <td>Anonymous</td>
                            @else
                            <td><a href="/user/{{$doc->user->name}}/docs">{{$doc->user->name}}</a></td>
                            @endif
                            @if(Auth::user() && Auth::user()->id == 1)
                            <td><a href="/delete/doc/as-admin/{{$doc->id}}">Delete</a></td>
                            @endif                                     
                        </tr>
                    @endforeach                                         
                    </tbody>
                </table>
        </div>
    </div> 
@stop    