<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostApproved;

class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show form to create a post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Admin approves post (trigger notification)
    public function approve(Post $post)
    {
        $user = $post->user;
        Notification::send($user, new PostApproved($post));

        return redirect()->route('posts.index')->with('success', 'Post approved and user notified!');
    }

    // Show notifications
    public function notifications()
    {
        $notifications = Auth::user()->notifications;
        return view('notifications.index', compact('notifications'));
    }
}
