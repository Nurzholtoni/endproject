@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    value="{{old('title')}}"
                    type="text" name="title" class="form-control" id="title" placeholder="Title">

                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="post_content" class="form-label">Post_content</label>
                <textarea name="post_content" class="form-control" id="post_content" placeholder="post_content">{{old('post_content')}}
                </textarea>
                @error('post_content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input
                    value="{{old('image')}}"
                    type="text" name="image" class="form-control" id="image" placeholder="Image">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <select class="form-select" aria-label="category" name="category_id">
                <option selected>Category</option>
                @foreach($categories as $category)
                    <option
                        {{ old('$category_id') == $category->id ? 'selected' : '' }}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
