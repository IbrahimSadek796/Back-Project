<?php

namespace App\Http\Controllers\agint;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class agintController extends Controller
{
    //

    public function index()
    {
        //


        $posts = Post::orderBy('id', 'DESC')->paginate(9);
        return view('agint.layouts.shope', compact('posts'));
    }
    public function showMen()
    {
        //
        $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        return view('agint.layouts.men', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showkids()
    {
        //
        $kids = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        return view('agint.layouts.kids', compact('kids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showwomen()
    {
        //
        $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        return view('agint.layouts.women', compact('array'));
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        //
        $array = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->paginate(8);
        $men = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','men')->paginate(8);
        $women = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','women')->paginate(8);
        $kids = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','kids')->paginate(8);
        $latest = Post::orderBy('id', 'DESC')->paginate(8);
        return view('agint.main', compact('array','men','women','kids', 'latest'));
    }

    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        //return view('agint.layouts.show', compact('post'));
        if (!$post) {
            return redirect(route('agint.layouts.shop'))->with('error', 'Post not found!');
        }

        return view('agint.layouts.show')->with([
            'post' => $post,
        ]);
    }
}
