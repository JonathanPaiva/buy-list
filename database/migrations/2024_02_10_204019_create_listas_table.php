<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            
            $table->string('nome', 100)
                ->nullable(false);
            
            $table->boolean('finalizada')
                ->default(false);
            
            $table->date('finalizada_data')
                ->nullable(true);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listas');
    }
};
