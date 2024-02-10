<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_listings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('listing_id')
                ->constrained('listings')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->foreignId('product_id')
                ->constrained('products')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            
            $table->integer('quantity')
                ->default(1)
                ->nullable(false);
            
            $table->float('price',8,2)
                ->default(0)
                ->nullable(false);

            $table->boolean('checked')
                ->default(false);

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_listings');
    }
};
