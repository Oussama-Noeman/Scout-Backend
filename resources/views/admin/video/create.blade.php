@extends('layouts.master')

@section('title')
    Videos
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add a new Video</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{url('admin/videos')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <input type="text" name="title" class="form-control">
             </div>
             <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control">
             </div>
             <div class="mb-3">
                <label for="">Caption</label>
                <input type="text" name="caption" class="form-control">
             </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Related Tags</label>
                <input type="text" name="related_tags" class="form-control">
             </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Playlist</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection