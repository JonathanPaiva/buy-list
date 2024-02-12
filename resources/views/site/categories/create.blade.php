<h2>Categorias - Novo</h2>

<div>
    <a href="{{ route('categories')}}">
        Voltar
    </a>
</div>

<br>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name" class="form-label">Categoria:</label>
    <input class="form-control" type="text" placeholder="Categoria" name="name">
    <button type="submit">Salvar</button>
</form>