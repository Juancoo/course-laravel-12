@extends('dashboard.master')

@section('title', 'Categoría')

@section('content')

    <a href="{{ route('categories.create')}}">Create</a>
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
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category)}}">Edit</a>
                        <a href="{{ route('categories.show',$category)}}">Show</a>
                        <form action="{{ route('categories.destroy', $category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links()}}
@endsection
