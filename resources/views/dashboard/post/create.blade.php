@extends('dashboard.master')
@section('title', 'Crear Post')
@section('content')

    <a href="{{ route('posts.index')}}">Regresar</a>    
    @include('dashboard.fragment._error-form')

    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <label>Título</label>
        <input type="text" name="title" value="{{old('title')}}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{old('slug')}}">

        <label>Contenido</label>
        <textarea name="content">{{old('content')}}</textarea>

        <label>Categoría</label>
        <select name="category_id">
            @foreach ($categories as $id => $title)
                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                    {{ $title }}
                </option>   
            @endforeach
        </select>

        <label>Descripción</label>
        <textarea name="description">{{old('description')}}</textarea>

        <label>Publicado</label>
        <select name="posted">
            <option value="not" {{ old('posted') == 'not' ? 'selected' : '' }}>No</option>
            <option value="yes" {{ old('posted') == 'yes' ? 'selected' : '' }}>Si</option>
        </select>

        <label>Imagen</label>
        <input type="file" name="image">

        <button type="submit">Send</button>
    </form>
@endsection
