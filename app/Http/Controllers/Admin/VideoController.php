<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index', compact('videos',));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $playlists = Playlist::all();
        return view('admin.video.create',compact('playlists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(VideoRequest $request)
    {
        $data = $request->validated();
        if($data)
        {
            $video = new Video;
            $video->playlist_id = $data['playlist_id'];
            $video->title = $data['title'];
            $video->slug = Str::slug($data['slug']);
            $video->caption = $data['caption'];
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $filename = time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/video',$filename);
                $video->image = $filename;
            }
            $video->related_tags = $data['related_tags'];
            $video->status= $request->status == true?'1':'0';

            $video->save();
            return redirect('admin/videos')->with('message', 'Video Added Successfully');

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
        $playlists = Playlist::all();
        $video = Video::find($id);
        return view('admin.video.edit', compact('video','playlists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(VideoRequest $request, $id)
    {
        $video = Video::find($id);
        $data = $request->validated();
        if ($data)
        {
            $video->playlist_id = $data['playlist_id'];
            $video->title = $data['title'];
            $video->slug = Str::slug($data['slug']);
            $video->caption = $data['caption'];
            if ($request->hasfile('image')) {
                $destination = 'uploads/video/' . $video->image;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/video', $filename);
                $video->image = $filename;
            }
            $video->related_tags = $data['related_tags'];
            $video->status = $request->status == true ? '1' : '0';

            $video->update();
            return redirect('admin/videos')->with('message', 'Video Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        if($video->image)
        {
            $destination = 'uploads/video/' . $video->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        }
        $video->delete();
    }
}
