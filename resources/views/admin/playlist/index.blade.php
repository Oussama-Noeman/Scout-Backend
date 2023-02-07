@extends('layouts.master')

@section('title')
    Playlists
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Playlists <a href="{{url('admin/playlists/create')}}" class="btn btn-primary btn-sm float-end">Add a Playlist</a></h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Playlist Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($playlists as $playlist)
                    <tr>
                        <td>{{$playlist->id}}</td>
                        <td>{{$playlist->title}}</td>
                        <td><img src="{{asset('uploads/playlist/'.$playlist->image)}}" alt="Playlist Image" width="50px" height="50px"></td>
                        <td>{{$playlist->status=='0'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{ url('admin/playlists/'.$playlist->id.'/edit')}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('admin/playlists/'.$playlist->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form> 
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection