<?php

namespace App\Services;

use App\Http\Requests\ListaRequest;
use App\Models\Lista;

class ListaServices 
{
    public function __construct(protected Lista $listaRepository )
    {
        
    }    

    public function getAll()
    {
        return $this->listaRepository->paginate();
    }

    public function getById(int $listaId)
    {
        return $this->listaRepository->findOrfail($listaId);
    }

    public function create(ListaRequest $listaRequest)
    {
        return $this->listaRepository->create($listaRequest->validated());
    }

    public function update(ListaRequest $listaRequest, int $listaId)
    {
        $lista = $this->getById($listaId);
        
        if (!$lista){
            return null;
        }
        
        $lista->update($listaRequest->validated());
        
        return $lista;
    }

    public function delete(int $listaId) : bool
    {
        $lista = $this->getById($listaId);

        if (!$lista) {
            return false;
        }
        
        $lista->delete();

        return true;
    }
}