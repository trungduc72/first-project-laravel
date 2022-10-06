@extends('layouts.clients')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-4">
            <h1 class="text-center">Login</h1>
        </div>
        <div class="col-8">
            @if ($errors -> any())
                <div class="alert alert-danger">Something Wrong</div>
            @endif
            @if (session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
            @endif
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" placeholder="Enter your username..." class="form-control" 
                        name="username" value="{{old('username')}}">
                        @error('username')
                            <span style="color: red">{{$message}}</span>                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" placeholder="Enter your password..." class="form-control" 
                        name="password" value="{{old('password')}}">
                        @error('password')
                            <span style="color: red">{{$message}}</span>                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <a href="{{route('register')}}">Register</a>                        
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{route('home')}}" class="btn btn-primary">Back</a>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    
@endsection