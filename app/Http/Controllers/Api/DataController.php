<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function playlists()
    {
        $playlists = Playlist::select(['id', 'title', 'image'])->get();
        return $playlists;
    }
    public function getPlaylist($id)
    {
        $playlist = Playlist::find($id);
        if($playlist)
        {
            return $playlist;
        }else
        {
            return ["Reslut" => "No Playlist Found With This ID, Check Your Database"];
        }
    }
    public function getPlaylistVideos($id)
    {
        $playlist = Playlist::find($id);
        if($playlist)
        {
            $videos = $playlist->videos;
            if($videos)
            {
                return $videos;
            }else
            {
                return ["Result" => "No Videos Added In This Playlist"];
            }
        }else
        {
            return ["Result" => "No Playlist Found With This ID, Check Your Database"];
        }
    }
    public function videos()
    {
        $videos = Video::all();
        return $videos;
    }
    public function getVideo($id)
    {
        $video = Video::find($id);
        if($video)
        {
            return $video;
        }else
        {
            return ["Reslut" => "No Video Found With This ID, Check Your Database"];
        }
    }
    public function books()
    {
        $books = Book::all();
        return $books;
    }
    public function getBook($id)
    {
        $book = Book::find($id);
        if($book)
        {
            return $book;
        }else
        {
            return ["Reslut" => "No Book Found With This ID, Check Your Database"];
        }
    }
}
