@extends('site.layouts.app')

@section('title', ' - Listagens')

@section('content')

    <h2>Listagem - Novo</h2>

    <div>
        <a href="{{ route('listings')}}">
            Voltar
        </a>
    </div>

    <br>

    @include('site.layouts.error')

    <form action="{{ route('listings.store') }}" method="POST">
        @csrf
        <label for="name" class="form-label">Lista:</label>
        <input class="form-control" type="text" placeholder="Lista" name="name" value="{{ old('name') }}">
        <button type="submit">Salvar</button>
    </form>

@endsection