<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlaylistRequest;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $playlists = Playlist::all();
        return view('admin.playlist.index',compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(PlaylistRequest $request)
    {
        $data = $request->validated();
        if($data)
        {
            $playlist = new Playlist;
            $playlist->title = $data['title'];
            $playlist->slug = Str::slug($data['slug']);
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/playlist/', $filename);
                $playlist->image = $filename;
            }
            $playlist->status = $request->status == true ? '1' : '0';

            $playlist->save();
            return redirect('admin/playlists')->with('message', 'Playlist Added Successfully');
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
        $playlist = Playlist::find($id);
        return view('admin.playlist.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(PlaylistRequest $request, $id)
    {
        $playlist = Playlist::find($id);
        $data = $request->validated();
        if($data)
        {
            $playlist->title = $data['title'];
            $playlist->slug = Str::slug($data['slug']);
            if($request->hasfile('image'))
            {
                $destination = 'uploads/playlist' . $playlist->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/playlist/', $filename);
                $playlist->image = $filename;
            }
            $playlist->status = $request->status == true ? '1' : '0';

            $playlist->update();

            return redirect('admin/playlists')->with('message', 'Playlist Upated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $playlist = Playlist::find($id);
        if($playlist->image)
        {
            $destination = 'uploads/playlist/' . $playlist->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        }
        $playlist->delete();
        return redirect('admin/playlists')->with('message', 'Playlist Deleted Successfully');
    }
}
