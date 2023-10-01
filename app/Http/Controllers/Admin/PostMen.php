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
    public function index(Request $request)
    {
        //
        if (request('search')) {
            $array = Post::where('kind' , '=' , 'men')->where('title', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            # code...
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        }

        return view('admin.layouts.men', compact('array'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showkids(Request $request)
    {
        //
        if (request('search')) {
            $kids = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->where('title', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            # code...
            $kids = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        }

        return view('admin.layouts.kids', compact('kids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showwomen(Request $request)
    {
        //
        if (request('search')) {
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->where('title', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            # code...
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        }

        return view('admin.layouts.women', compact('array'));
    }

    /**
     * Display the specified resource.
     */
    public function showAll(Request $request)
    {

        $men = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','men')->get();
        $women = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','women')->get();
        $kids = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','kids')->get();
        if (request('search')) {
            # code...
            $latest = Post::orderBy('id', 'DESC')->where('kind', 'like', '%' . request('search') . '%')->get();


        }else {
            # code...
            $latest = Post::orderBy('id', 'DESC')->paginate(8);
        }
        if ($request->ajax()) {
            # code...
            $view = view('admin.data',compact('latest'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('admin.main', compact('men','women','kids', 'latest'));
    }

}
