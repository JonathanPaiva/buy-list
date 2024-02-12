<h1>Produtos</h1>

<table>
    <thead>
        <th>Id:</th>
        <th>Nome:</th>
        <th>Categoria:</th>
    </thead>
    <tbody>
        @foreach ($products as $product )
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>