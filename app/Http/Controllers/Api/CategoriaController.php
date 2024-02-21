<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use App\Services\CategoriaServices;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{

    public function __construct(protected CategoriaServices $categoriaService) 
    { 

    }   

    public function index()
    {
        $dados = $this->categoriaService->getAll();
        
        return CategoriaResource::collection($dados);
    }

    public function store(CategoriaRequest $categoriaRequest, int $categoria_id = 0)
    {
        if ($categoria_id) {
            
            if (!$categoria_id = $categoriaRequest->id) {
                return Response::HTTP_NOT_FOUND;
            }
            
            $categoria = $this->categoriaService->update($categoriaRequest, $categoria_id);
    
            return new CategoriaResource($categoria);
        }

        $categoria = $this->categoriaService->create($categoriaRequest);

        return new CategoriaResource($categoria);
    }

    public function show(int $categoria_id)
    {
        if ( !$categoria = $this->categoriaService->getById($categoria_id) ) {
            return Response::HTTP_NOT_FOUND;
        }
        return new CategoriaResource($categoria);
    }

    public function destroy(int $categoria_id)
    {
        if ( !$this->categoriaService->delete($categoria_id) ) {
            return Response::HTTP_NOT_FOUND;
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
