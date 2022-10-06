@extends('layouts.clients')

@section('title')
    {{$title}}
@endsection

@section('content')
<h1>HOME</h1>
    
@endsection

@section('account')
    <a class="nav-link" href="{{route('login')}}">Login</a>
    <a class="nav-link" href="{{route('register')}}">Register</a>
@endsection
    

