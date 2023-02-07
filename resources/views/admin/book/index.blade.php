@extends('layouts.master')

@section('title')
    Books
@endsection

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Books <a href="{{url('admin/books/create')}}" class="btn btn-primary btn-sm float-end">Add a Book</a></h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Caption</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->caption}}</td>
                        <td><img src="{{asset('uploads/book/'.$book->image)}}" alt="book Image" width="50px" height="50px"></td>
                        <td>{{$book->status=='0'?'Hidden':'Shown'}}</td>
                        <td>
                            <a href="{{ url('admin/books/'.$book->id.'/edit')}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('admin/books/'.$book->id)}}" method="POST">
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