<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        // return view('home.index', ["posts" => $posts]);
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('home.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:250',
            'image' => 'required|image|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->description = $validatedData['description'];
        $p->image = $imageName;
        $p->user_id = Auth::id();
        $p->save();

        // return back()->with('success', 'Image Uploaded Successfully!')->with('image', $imageName);
        session()->flash('message', 'Post was created.');
        return redirect()->route('home.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_post(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:250',
        ]);

        $referer = $_SERVER['HTTP_REFERER'] ?? null;
        $post_id = (int)filter_var($referer, FILTER_SANITIZE_NUMBER_INT);
        $post = Post::findOrFail($post_id);
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->save();

        return redirect()->route('home.show', ["id" => $post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $loggedIn = Auth::id();
        return view('home.show', ['post' => $post, 'loggedIn' => $loggedIn]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_profile($id)
    {
        $user = User::findOrFail($id);
        $loggedIn = Auth::id();
        return view('home.profile', ['user' => $user, 'loggedIn' => $loggedIn]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_comment($id)
    {
        $comment = Comment::findOrFail($id);
        return view('home.show_comment', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $loggedIn = Auth::id();
        return view('home.edit', ['post' => $post, 'loggedIn' => $loggedIn]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home.index')->with('message', 'Post was deleted.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_comment($id)
    {
        $comment = Comment::findOrFail($id);
        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('home.show', ["id" => $comment->post_id])->with('message', 'Comment was deleted.');
    }
}
