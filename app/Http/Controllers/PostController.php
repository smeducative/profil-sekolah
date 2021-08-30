<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        Post::create([
            'user_id'   => auth()->id(),
            'title'     => $request->title,
            'slug'      => Str::slug($request->title . '-' . Str::random(5)),
            'cover'     => $request->file('cover')->storeAs('upload', $request->file('cover')->getClientOriginalName(), 'public'),
            'body'      => $request->body
        ]);

        session()->flash('success', 'Post baru telah di tambahkan');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('pages.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        request()->validate([
            'title' => ['required'],
            'body'  => ['required']
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->slug);
        $post->body = $request->body;

        if ($request->hasFile('cover')) {
            $$post->cover = $request->file('cover')->storeAs('upload', $request->file('cover')->getClientOriginalName(), 'public');
        }

        $post->save();

        session()->flash('success', 'Post berhasil di update');

        return redirect()->route('post.index');
    }

    public function delete(Post $post)
    {
        Storage::delete($post->cover);

        $post->delete();

        session()->flash('success', 'Post berhasil di hapus');

        return back();
    }
}
