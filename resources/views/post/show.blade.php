@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->title}}</div>
        <div>{{$post->post_content}}</div>
    </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
        @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>

    </div>
    <div>
        <a href="{{ route('post.index') }}">Baack</a>
    </div>
@endsection
