@extends('dashboard.master')
@section('title', 'Editar Post')
@section('content')

    <a href="{{ route('posts.index')}}">Regresar</a>    
    @include('dashboard.fragment._error-form')

    <form action="{{route('posts.update', $post)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <label>Título</label>
        <input type="text" name="title" value="{{old('title', $post->title)}}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{old('slug', $post->slug)}}">

        <label>Contenido</label>
        <textarea name="content">{{old('content', $post->content)}}</textarea>

        <label>Categoría</label>
        <select name="category_id">
            @foreach ($categories as $id => $title)
                <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}>
                    {{ $title }}
                </option>   
            @endforeach
        </select>

        <label>Descripción</label>
        <textarea name="description">{{old('description', $post->description)}}</textarea>

        <label>Publicado</label>
        <select name="posted">
            <option value="not" {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }}>No</option>
            <option value="yes" {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }}>Si</option>
        </select>

        <label>Imagen</label>
        <img src="{{ asset('storage/' . $post->image) }}" width="200">
        <input type="file" name="image">

        <button type="submit">Send</button>
    </form>
@endsection
