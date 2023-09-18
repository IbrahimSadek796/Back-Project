<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostMen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        return view('admin.layouts.men', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showkids()
    {
        //
        $kids = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        return view('admin.layouts.kids', compact('kids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showwomen()
    {
        //
        $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        return view('admin.layouts.women', compact('array'));
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
        return view('admin.main', compact('array','men','women','kids', 'latest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showlatest()
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
