@extends('story_layout')

@section('image')
	 <img src="images/stories/bear/beach_1.png" alt="1" style="width:800px;height:450px;position:absolute;left:15%;top:10%;">
@stop

@section('text')
    @if (Auth::check()){
    {{ Auth::user()->id }}
    {{ Auth::user()->name }}
    {{ Auth::user()->email }}
    }
    @else{
        {{ "No user logged in !"}}
    }
    @endif
	I love the beach! But I must wear a hat to keep the sun off my face.
@stop