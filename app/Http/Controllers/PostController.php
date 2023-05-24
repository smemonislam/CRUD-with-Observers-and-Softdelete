<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $posts = Post::latest()->paginate(5);
        return view('index', compact('posts'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        Post::create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()
        ->where('deleted_at', '!=', NULL)
        ->paginate(5);

        return view('restore', compact('posts'));
    }

    public function restore($post){
        $restore = Post::withTrashed()->findOrFail($post);
        if(!empty($restore)){
            $restore->restore();
        }
        return redirect()->back();
    }

    public function delete($post){
        $delete = Post::withTrashed()->findOrFail($post);
        if(!empty($delete)){
            $delete->forceDelete();
        }

        return redirect()->back();
    }
}
