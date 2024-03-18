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
        Schema::create('aux_metas_categoria', function (Blueprint $table) {
            $table->id();
            $table->string('categoria_id');
            $table->string('meta_id');
            $table->timestamps();
    
            $table->foreign('categoria_id')->references('rotuloID')->on('categorias')->onDelete('cascade');
            $table->foreign('meta_id')->references('rotuloID')->on('metas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_metas_categoria');
    }
};
