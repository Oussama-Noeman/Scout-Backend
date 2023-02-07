@extends('layouts.master')

@section('title')
    Books
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Book</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{url('admin/books/'.$book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
             <div class="mb-3">
                <label for="">Book Title</label>
                <input type="text" name="title" class="form-control" value="{{$book->title}}">
             </div>
             <div class="mb-3">
                <label for="">Caption</label>
                <input type="text" name="caption" class="form-control" value="{{$book->caption}}">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="{{asset('uploads/book/'.$book->image)}}" alt="No book Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Related Tags</label>
                <input type="text" name="related_tags" class="form-control" value="{{$book->related_tags}}">
             </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$book->status==1?'checked':''}}>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update book</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection