<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{

    public function __construct(protected Categoria $categoriaRepository) 
    { 

    }   

    public function index()
    {
        $dados = $this->categoriaRepository->paginate();
        
        return CategoriaResource::collection($dados);
    }

    public function store(CategoriaRequest $request, int $id = 0)
    {
        if ($id) {
            if ( !$categoria = $this->categoriaRepository->findOrfail($id) ) {
                return Response::HTTP_NOT_FOUND();
            }
    
            $categoria->update($request->validated());
    
            return new CategoriaResource($categoria);
        }

        $categoria = $this->categoriaRepository->create($request->validated());

        return new CategoriaResource($categoria);
    }

    public function show(int $id)
    {
        if ( !$categoria = $this->categoriaRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }
        return new CategoriaResource($categoria);
    }

    public function destroy(int $id)
    {
        if ( !$categoria = $this->categoriaRepository->findOrfail($id) ) {
            return Response::HTTP_NOT_FOUND();
        }

        $categoria->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
