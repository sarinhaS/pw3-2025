<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::withCount('posts')->get();
        return view('blog.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function categoria($id)
    {
        $categoria = Category::where('id', $id)->firstOrFail();
        $posts = $categoria->posts()->latest()->paginate(5);
        return view('blog.categoria', compact('categoria', 'posts'));
    }

    // Exibir um post específico com seus comentários
    public function post($id)
    {
        $post = Post::where('id', $id)->with('Comments')->firstOrFail();
        return view('blog.post', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $dados = $request->validated();
        $dados['user_id'] = Auth::id();
        

        Comment::create($dados);
        return redirect()->route('blog.post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
