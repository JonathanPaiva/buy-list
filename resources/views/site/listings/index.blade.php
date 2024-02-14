@extends('site.layouts.app')

@section('title', ' - Listagens')

@section('content')

    <h1>Listas</h1>

    <div>
        <a href="{{ route('listings.create')}}">
            Nova Listagem
        </a>
    </div>

    <br>

    <table>
        <thead>
            <th>Id:</th>
            <th>Nome:</th>
            <th>Data:</th>
            <th>Concluída:</th>
            <th>Data Conclusão:</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($listings as $listing )
                <tr>
                    <td>{{ $listing->id }}</td>
                    <td>{{ $listing->name }}</td>
                    <td>{{ $listing->created_at }}</td>
                    <td>{{ $listing->completed }}</td>
                    <td>{{ $listing->completed_date }}</td>
                    <td>
                        <div class="">
                            <form action="{{ route('listings.destroy', $listing->id) }}" method="post">
                                @csrf()
                                @method('DELETE')
                                <a href="{{ route('listings.edit', $listing->id) }}">Editar</a>
                                <button type="submit">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection