@extends('layouts.clients')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-4">
            <h1 class="text-center">Add User</h1>
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
                        <label for="">Name</label>
                        <input type="text" placeholder="Enter your name..." class="form-control" 
                        name="name" value="{{old('name')}}">
                        @error('name')
                            <span style="color: red">{{$message}}</span>                            
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" placeholder="Enter your email..." class="form-control" 
                        name="email" value="{{old('email')}}">
                        @error('email')
                            <span style="color: red">{{$message}}</span>                            
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{route('users')}}" class="btn btn-primary">Back</a>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    
@endsection