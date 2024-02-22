<?php

namespace App\Services;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;

class ProdutoServices 
{
    public function __construct(protected Produto $produtoRepository )
    {
        
    }    

    public function getAll()
    {
        return $this->produtoRepository->paginate();
    }

    public function getById(int $produto_id)
    {
        return $this->produtoRepository->findOrfail($produto_id);
    }

    public function create(ProdutoRequest $produtoRequest)
    {
        return $this->produtoRepository->create($produtoRequest->validated());
    }

    public function update(ProdutoRequest $produtoRequest, int $produto_id)
    {
        $produto = $this->getById($produto_id);
        
        if (!$produto){
            return null;
        }
        
        $produto->update($produtoRequest->validated());
        
        return $produto;
    }

    public function delete(int $produto_id) : bool
    {
        $produto = $this->getById($produto_id);

        if (!$produto) {
            return false;
        }
        
        $produto->delete();

        return true;
    }
}