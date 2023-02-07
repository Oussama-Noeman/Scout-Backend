@extends('layouts.master')

@section('title')
    playlists
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Playlist</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{url('admin/playlists/'.$playlist->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
             <div class="mb-3">
                <label for="">Playlist Title</label>
                <input type="text" name="title" class="form-control" value="{{$playlist->title}}">
             </div>
             <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$playlist->slug}}">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="{{asset('uploads/playlist/'.$playlist->image)}}" alt="No playlist Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$playlist->status==1?'checked':''}}>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Playlist</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection