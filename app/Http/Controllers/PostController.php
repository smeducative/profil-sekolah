<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();

        return view('pages.post.index', compact('posts'));
    }

    public function show(Request $request, Post $post)
    {
        return view('pages.post.show', compact('post'));
    }

    public function store()
    {
        return view('pages.post.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body'  => ['required']
        ]);

        if ($request->hasFile('cover')) {
            $dir = $request->file('cover')->storePubliclyAs('upload', Str::slug($request->file('cover')->getClientOriginalName()));
        }

        Post::create([
            'user_id'   => auth()->id(),
            'title'     => $request->title,
            'slug'      => Str::slug($request->title . '-' . Str::random(5)),
            'cover'     => $dir,
            'body'      => $request->body
        ]);

        session()->flash('success', 'Post baru telah di tambahkan');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('pages.post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        request()->validate([
            'title' => ['required'],
            'body'  => ['required']
        ]);

        $post->update(request()->all());

        session()->flash('success', 'Post berhasil di update');

        return back();
    }

    public function delete(Post $post)
    {
        $post->delete();

        session()->flash('success', 'Post berhasil di hapus');

        return back();
    }
}
