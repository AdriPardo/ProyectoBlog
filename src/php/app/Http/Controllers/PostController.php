<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]
        );
    }
    protected $fillable = ['titulo', 'contenido'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('titulo', 'ASC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = User::findOrFail($request->get('user'));
        $post = new Post();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->user()->associate($user);
        $post->save();
        return redirect()->route('posts.index');
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
        return view('posts.show', compact('post'));
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
        $user = User::findOrFail($post->user_id);
        $users = DB::table('users')->where('id', '!=', $post->user_id)->get();
        return view('posts.edit', compact('post', 'user', 'users'));
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
        $post = Post::findOrFail($id);
        $user = User::findOrFail($request->get('user'));
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->user()->associate($user);
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        $posts = Post::orderBy('titulo', 'ASC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
