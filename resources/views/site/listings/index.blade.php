<h1>Listas</h1>

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
                    <div>
                        <button>Editar</button>
                        <button>Excluir</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>