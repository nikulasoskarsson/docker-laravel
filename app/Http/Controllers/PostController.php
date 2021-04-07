<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostsView()
    {
        $posts = Post::all();

        return view('all-posts', compact('posts'));
    }

    public function getSinglePostView($id)
    {
        $post = Post::find($id);

        return view('single-post', compact('post'));
    }

    public function addPostView()
    {
        return view('add-post');
    }

    public function addPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_created', 'You have created a new post!');
    }

    public function updatePostView($postId)
    {
        $post = Post::find($postId);

        return view('update-post', compact('post'));
    }

    public function updatePost(Request $request, $postId)
    {
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return back()->with('post_updated', 'Post has been updated');
    }

    public function deletePost($postId)
    {
        Post::where('id', $postId)->delete();

        return back()->with('post_deleted', 'Post has been deleted');
    }
}
