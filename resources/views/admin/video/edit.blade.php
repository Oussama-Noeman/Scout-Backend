@extends('layouts.master')

@section('title')
    Videos
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Video</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{url('admin/videos/'.$video->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="">Playlist</label>
                <select name="playlist_id" id="" class="form-control">
                @foreach ($playlists as $playlist)
                <option value="{{$playlist->id}}">{{$playlist->title}}</option>
                @endforeach
                </select>
            </div>
             <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{$video->title}}">
             </div>
             <div class="mb-3">
                <label for="">caption</label>
                <input type="text" name="caption" class="form-control" value="{{$video->caption}}">
             </div>
             <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$video->slug}}">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="{{asset('uploads/video/'.$video->image)}}" alt="No video Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Related Tags</label>
                <input type="text" name="related_tags" class="form-control" value="{{$video->related_tags}}">
             </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$video->status==1?'checked':''}}>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update video</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection