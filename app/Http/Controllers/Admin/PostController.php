<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if (request('search')) {
            $posts = Post::orderBy('id', 'DESC')->where('kind', 'like', '%' . request('search') . '%')->paginate(9);
        }else {
            # code...
            $posts = Post::orderBy('id', 'DESC')->paginate(9);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'number_of_product' => 'numeric',
            'taxs' => 'numeric',
            'image' => 'image|max:6000',
            'quality' => 'numeric',
            'kind' => 'required|string',
        ]);

        // $path = $request->file('image')->store('Posts');
        // dd($path);
        $validated['image'] = $request->file('image')->store('Posts');


         Post::create($validated);



        return redirect(route('posts.index'))->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);

        if (!$post) {
            return redirect(route('admin.posts.index'))->with('error', 'Post not found!');
        }

        return view('admin.posts.edit')->with([
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|unique:posts,title,' . $id . '|max:100',
            'description' => 'nullable|string',

            'price' => 'numeric',
            'number_of_product' => 'numeric',
            'taxs' => 'numeric',
            'image' => 'image|max:6000',
            'quality' => 'numeric',
            'kind' => 'required|string',
        ]);

        $post = Post::find($id);

        if (!$post) {
            return redirect(route('admin.posts.index'))->with('error', 'Post not found!');
        }

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('Posts.images');
            \Storage::delete($post->image);
        }

        $post->update($validated);



        return redirect(route('posts.index'))->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::find($id);

        \Storage::delete($post->image);
        $post?->delete();

        return redirect(route('posts.index'))->with('success', 'Post deleted successfully');
    }
}
