@extends('site.layouts.app')

@section('title', ' - Categorias')

@section('content')

    <h2>Categorias - Editar</h2>

    <div>
        <a href="{{ route('categories')}}">
            Voltar
        </a>
    </div>

    <br>

    @include('site.layouts.error')

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id" class="form-label">ID:</label>
        <label class="form-control" type="text" name="id">{{ $category->id }}</label>
        
        <label for="name" class="form-label">Categoria:</label>
        <input class="form-control" type="text" name="name" value="{{ $category->name }}">
        
        <button type="submit">Salvar</button>
    </form>

@endsection