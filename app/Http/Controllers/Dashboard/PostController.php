<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $post = Post::find(1);
        // dd($post->category->title);

        // $categories = Category::find(1);
        // dd($categories->posts);
        // dd($categories->posts[0]->title);

        // Post::create([
        //     'title' => 'Title 3',
        //     'slug' => 'Test Slug',
        //     'content' => 'test content',
        //     'category_id' => 1,
        //     'description' => 'test description',
        //     'image' => 'test image'
        // ]);

        //$posts = Post::get();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = Category::all();
        $categories = Category::pluck('title', 'id');
        // dd($categories);
        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // $validation = $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:7',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:7',
        //     'posted' => 'required'
        // ]);

        // dd($validation);
        //dd($request->all());
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'content' => $request->content,
        //     'category_id' => $request->category_id,
        //     'description' => $request->description,
        //     'posted' => $request->posted,
        //     'image' => 'test image'
        // ]);

        //create2
        //Post::create($request->all());
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->storeAs('posts', now()->format('YmdHis') . '_' .$file->getClientOriginalName(), 'public');
        }
        Post::create($data);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('title', 'id');
        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->storeAs('posts', now()->format('YmdHis') . '_' .$file->getClientOriginalName(), 'public');
        }
        $post->update($data);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
