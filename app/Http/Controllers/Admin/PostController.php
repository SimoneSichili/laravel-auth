<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//mail
use Illuminate\Support\Facades\Mail;
use App\Mail\PostMail;
// storage
use Illuminate\Support\Facades\Storage;
//post
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["user_id"]= Auth::id();

        $request->validate(
            [
                'title' => 'required|max:100',
                'text' => 'required',
            ]
        );

        // dd($data);
        
        // creazione
        $newPost = new Post();
        // valorizzazione e salvataggio
        if(!empty($data["img_path"])) {
            $data["img_path"] = Storage::disk('public')->put('images', $data["img_path"]);
        }

        $newPost->fill($data)->save();

        // invio email
        Mail::to('donald@email.com')->send(new PostMail($newPost));

        return redirect()->route('admin.posts.index')->with("message", "Post creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required|max:100',
                'text' => 'required',
            ]
        );

        $post->update($data);

        return redirect()->route('admin.posts.index')->with("message", "Post aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with("message", "Post eliminato correttamente");
    }
}
