@extends('layouts.main')
@section('content')
<div>
    <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post_content</label>
            <textarea name="post_content" class="form-control" id="post_content" placeholder="post_content">{{$post->post_content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{$post->title}}" placeholder="Image">
        </div>
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Category</option>
            @foreach($categories as $category)
                <option

                    {{ $category->id == $post->category_id ? 'selected' : '' }}
                    value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id === $postTag->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
