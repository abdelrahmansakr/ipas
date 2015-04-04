@extends('home_layout')

@section('login_logout')

@if (Auth::guest())
    <li><a href="{{ url('/auth/login') }}">Login</a></li>
    <li><a href="{{ url('/auth/register') }}">Register</a></li>
@else
    <li><a href="#">{{ Auth::user()->name }}</a></li>
    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
@endif

@stop