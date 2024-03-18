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
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->string('rotuloID',140)->unique();
            $table->string('rotulo',140)->unique();
            $table->text('descricao')->nullable();
            $table->string('autor',50);

            $table->string('flag',50)->nullable();
            $table->string('anexo',256)->nullable();

            $table->integer('prioridade');
            $table->datetime('prazo')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};