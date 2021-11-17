<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Mockery\Exception\InvalidOrderException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('show-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $title = $request->get('title');
        $body = $request->get('body');

        Post::create([
            'title' => $title,
            'body' => $body
        ]);

        return back()->with('post_created', 'Post has been created successfully!');
                
    }

    public function getPostById($id){

        $post = Post::where('id', $id)->first(); 
        return view('single-post', compact('post'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id) 
    {
        $post = Post::find($id);
        return view('edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) 
    {
        $post = Post::find($request->get('id')); 
        $post->title = $request->get('title'); 
        $post->body = $request->get('body'); 

        $post->save(); 

        return back()->with('post_updated', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {     
                //1. yöntem
        try {
            $post= $post->findOrFail($id); 
            $post->delete();                
                                            
                                            
            return back()->with('success', 'Veri başarıyla silindi');

           
           } catch (ModelNotFoundException $e) {
             return back()->with('unsuccessful', 'Veri bulunamadı');
             
           }

        

    }
}
