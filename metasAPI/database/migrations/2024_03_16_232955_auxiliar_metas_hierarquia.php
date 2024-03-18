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
        Schema::create('aux_metas_hierarquia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meta_mae');
            $table->unsignedBigInteger('meta_filha');
            $table->timestamps();
    
            $table->foreign('meta_mae')->references('id')->on('metas')->onDelete('cascade');
            $table->foreign('meta_filha')->references('id')->on('metas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_metas_hierarquia');
    }
};
