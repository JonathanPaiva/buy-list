<h2>Categorias</h2>

<div>
    <a href="{{ route('categories.create')}}">
        Criar Categoria
    </a>
</div>

<br>

<table>
    <thead>
        <th>Id:</th>
        <th>Nome:</th>
        <th>Ações:</th>
    </thead>
    <tbody>
        @foreach ($categories as $category )
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="">
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf()
                            @method('DELETE')
                            <a href="{{ route('categories.edit', $category->id) }}">Editar</a>
                            <button type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>