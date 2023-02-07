<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();
        if($data)
        {
            $book = new Book;
            $book->title = $data['title'];
            $book->caption = $data['caption'];
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/book/', $filename);
                $book->image = $filename;
            }
            $book->related_tags = $data['related_tags'];
            $book->status = $request->status == true ? '1' : '0';

            $book->save();
            return redirect('admin/books')->with('message', 'Book Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::find($id);
        $data = $request->validated();
        if($data)
        {
            $book->title = $data['title'];
            $book->caption =$data['caption'];
            if($request->hasfile('image'))
            {
                $destination = 'uploads/book' . $book->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/book/', $filename);
                $book->image = $filename;
            }
            $book->related_tags =$data['related_tags'];
            $book->status = $request->status == true ? '1' : '0';

            $book->update();

            return redirect('admin/books')->with('message', 'Book Upated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book->image)
        {
            $destination = 'uploads/book/' . $book->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        }
        $book->delete();
        return redirect('admin/books')->with('message', 'Book Deleted Successfully');
    }
}
