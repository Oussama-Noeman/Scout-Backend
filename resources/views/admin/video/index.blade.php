@extends('layouts.master')

@section('title')
    Videos
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Videos <a href="{{url('admin/videos/create')}}" class="btn btn-primary btn-sm float-end">Add a Video</a></h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Playlist</th>
                    <th>Video Title</th>
                    <th>Caption</th>
                    <th>Image</th>
                    <th>Related Tags</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                    <tr>
                        <td>{{$video->id}}</td>
                        <td>{{$video->playlist->title}}</td>
                        <td>{{$video->title}}</td>
                        <td>{{$video->caption}}</td>
                        <td><img src="{{asset('uploads/video/'.$video->image)}}" alt="video Image" width="50px" height="50px"></td>
                        <td>{{$video->related_tags}}</td>
                        <td>{{$video->status=='0'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{ url('admin/videos/'.$video->id.'/edit')}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('admin/videos/'.$video->id)}}" method="POST">
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