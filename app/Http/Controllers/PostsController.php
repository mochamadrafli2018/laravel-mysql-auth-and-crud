<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class PostsController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function createNewData(request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        // save
        $siswa->save();
        return "Data berhasil di input";
    }

    public function findandUpdateById(request $request, $id)
    {
        $title=$request->title;
        $slug=$request->slug;
        $content=$request->content;
        // find id
        $post=Post::find($id);
        $post->title=$title;
        $post->slug=$slug;
        $post->content=$content;
        // save
        $post->save();   
        return "Data berhasil di update";
    }
    public function findandRemoveById($id)
    {
        $post=Siswa::find($id);
        // delete
        $post->delete();
        return "Data berhasil di hapus";
    }
}