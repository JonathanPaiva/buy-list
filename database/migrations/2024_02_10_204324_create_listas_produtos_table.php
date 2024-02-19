<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('listas_produtos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('lista_id')
                ->constrained('listas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            
            $table->integer('quantidade')
                ->default(1)
                ->nullable(false);
            
            $table->float('preco',8,2)
                ->default(0)
                ->nullable(false);

            $table->boolean('confirmado')
                ->default(false);

            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listas_produtos');
    }
};
