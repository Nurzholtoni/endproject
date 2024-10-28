<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'post_content' => 'nullable|string',
            'image' => 'string',
            'category_id' => 'nullable|integer',
            'tags' => '',

        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        foreach ($tags as $tag) {
            PostTag::firstOrCreate([
                'tag_id' => $tag,
                'post_id' => $post->id,
            ]);
        }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'post_content' => 'nullable|string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        $post = Post::withoutTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public function first_Or_Create()
    {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some image.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
            'title' => 'some title of post from phpstorm',
        ], [
            'title' => 'some title of post from phpstorm',
            'content' => 'content of post from phpstorm',
            'image' => 'image.jpg',
            'likes' => 10,
            'is_published' => 1,
        ]);
    }

    public function update_Or_Create()
    {
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some image.jpg',
            'likes' => 500,
            'is_published' => 0,
        ];
        $post = Post::updateOrCreate([
            'title' => 'some of title of post from phpstorm'
        ], [
            'title' => 'some title of post from phpstorm',
            'content' => 'content of post from phpstorm',
            'image' => 'image.jpg',
            'likes' => 100,
            'is_published' => 0,
        ]);
        dump($post->title);
        dd('updated');
    }
}
