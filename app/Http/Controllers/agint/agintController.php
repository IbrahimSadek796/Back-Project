<?php

namespace App\Http\Controllers\agint;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class agintController extends Controller
{
    //

    public function index(Request $request)
    {
        //
        if (request('search')) {
            $posts = Post::orderBy('id', 'DESC')->where('kind', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            $posts = Post::orderBy('id', 'DESC')->paginate(9);
        }


        return view('agint.layouts.shope', compact('posts'));
    }
    public function showMen(Request $request)
    {
        //
        if (request('search')) {
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->where('title', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'men')->paginate(9);
        }

        return view('agint.layouts.men', compact('array'));
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
            $kids = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'kids')->paginate(9);
        }

        return view('agint.layouts.kids', compact('kids'));
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
            $array = Post::orderBy('id', 'DESC')->where('kind' , '=' , 'women')->paginate(9);
        }

        return view('agint.layouts.women', compact('array'));
    }

    /**
     * Display the specified resource.
     */
    public function showAll(Request $request)
        // Check for search input
    {



        if (request('search')) {
            # code...
            $latest = Post::orderBy('id', 'DESC')->where('kind', 'like', '%' . request('search') . '%')->get();


        }else {
            # code...


            $latest = Post::orderBy('id', 'DESC')->paginate(8);
        }

        if ($request->ajax()) {
            # code...
            $view = view('agint.data',compact('latest'))->render();
            return response()->json(['html'=>$view]);
        }
        $men = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','men')->get();
        $women = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','women')->get();
        $kids = Post::orderBy('id', 'DESC')->where('quality' , '>' , '3')->where('kind','=','kids')->get();

        return view('agint.main', compact('men','women','kids', 'latest'));
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
