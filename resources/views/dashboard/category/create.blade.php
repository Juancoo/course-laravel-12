@extends('dashboard.master')
@section('title', 'Crear Categoría')
@section('content')

    <a href="{{ route('categories.index')}}">Regresar</a>    
    @include('dashboard.fragment._error-form')

    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <label>Título</label>
        <input type="text" name="title" value="{{old('title')}}">

        <label>Slug</label>
        <input type="text" name="slug" value="{{old('slug')}}">

        <button type="submit">Send</button>
    </form>
@endsection
