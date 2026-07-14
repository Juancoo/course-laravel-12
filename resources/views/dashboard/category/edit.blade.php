@extends('dashboard.master')
@section('title', 'Editar Categoría')
@section('content')

    <a href="{{ route('categories.index')}}">Regresar</a>    
    @include('dashboard.fragment._error-form')

    <form action="{{route('categories.update', $category)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <label>Título</label>
        <input type="text" name="title" value="{{old('title', $category->title)}}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{old('slug', $category->slug)}}">

        <button type="submit">Send</button>
    </form>
@endsection
