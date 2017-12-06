<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * Show Posts.Index paginate with 5 posts per page
     *
     * @return View
     */
    public function index()
    {
      $posts = Post::paginate(5);

      return view('posts.index', compact('posts'));
    }

    /**
     *  Favorite a post
     *
     * @param  Post $post
     * @return Response
     */
    public function favoritePost(Post $post)
    {
      Auth::user()->favorites()->attach($post->id);

      return back();
    }

    /**
     * Unfavorite a post
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoritePost(Post $post)
    {
      Auth::user()->favorites()->detach($post->id);

      return back();
    }
}
