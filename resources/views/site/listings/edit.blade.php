@extends('site.layouts.app')

@section('title', ' - Listagens')

@section('content')

    <h2>Listagem - Editar</h2>

    <div>
        <a href="{{ route('listings')}}">
            Voltar
        </a>
    </div>

    <br>

    @include('site.layouts.error')

    <form action="{{ route('listings.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id" class="form-label">ID:</label>
        <label class="form-control" type="text" name="id">{{ $listing->id }}</label>
        
        <label for="name" class="form-label">Lista:</label>
        <input class="form-control" type="text" name="name" value="{{ $listing->name }}">

        <label for="completed" class="form-label">Concluído:</label>
        <input class="form-control" type="text" name="completed" value="{{ $listing->completed }}">

        <label for="completed_date" class="form-label">Data Conclusão:</label>
        <input class="form-control" type="text" name="completed_date" value="{{ $listing->completed_date }}">

        <button type="submit">Salvar</button>
    </form>

@endsection