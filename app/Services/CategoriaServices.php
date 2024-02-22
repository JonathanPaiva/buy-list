<?php

namespace App\Services;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaServices 
{
    public function __construct(protected Categoria $categoriaRepository )
    {
        
    }    

    public function getAll()
    {
        return $this->categoriaRepository->paginate();
    }

    public function getById(int $categoria_id)
    {
        return $this->categoriaRepository->findOrfail($categoria_id);
    }

    public function create(CategoriaRequest $categoriaRequest)
    {
        return $this->categoriaRepository->create($categoriaRequest->validated());
    }

    public function update(CategoriaRequest $categoriaRequest, int $categoria_id)
    {
        $categoria = $this->getById($categoria_id);
        
        if (!$categoria){
            return null;
        }
        
        $categoria->update($categoriaRequest->validated());
        
        return $categoria;
    }

    public function delete(int $categoria_id) : bool
    {
        $categoria = $this->getById($categoria_id);

        if (!$categoria) {
            return false;
        }
        
        $categoria->delete();

        return true;
    }
}