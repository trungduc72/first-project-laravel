@extends('layouts.clients')

@section('title')
    {{$title}}
@endsection

@section('list_user')
    <a class="nav-link" href="{{route('users')}}">Users</a>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-4">
                <h1 class="text-center">List Users</h1>
            </div>
            <div class="col-8">

                @if (session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($users))
                            @foreach ($users as $key =>$item)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a href="{{route('users.edit', ['id'=>$item->id])}}" class="btn btn-warning btn-sm" style="width: 100%">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{route('users.delete', ['id'=>$item->id])}}" class="btn btn-danger btn-sm" style="width: 100%"
                                            onclick="return confirm('Delete?')" >Delete</a>
                                    </td>
                                </tr>                
                            @endforeach
                        @else 
                            <tr>
                                <td colspan="5">Null</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <a href="{{route('users.add')}} " class="btn btn-primary ">Add Users</a>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('account')
    <a class="nav-link" href="{{route('home')}}">Log out</a>
@endsection