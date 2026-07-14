@extends('dashboard.master')

@section('title', 'Post')

@section('content')

    <a href="{{ route('posts.create')}}">Create</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Posted</th>
                <th>Category<th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->posted}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>
                        <a href="{{ route('posts.edit',$post)}}">Edit</a>
                        <a href="{{ route('posts.show',$post)}}">Show</a>
                        <form action="{{ route('posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
@endsection
