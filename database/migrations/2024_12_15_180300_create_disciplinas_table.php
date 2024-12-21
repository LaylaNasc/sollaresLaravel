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
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('nomeDisciplina', 255);
            $table->integer('codigo');
            $table->integer('cargaHoraria');
            $table->integer('limiteAlunos'); 
            $table->foreignId('professor_id')->constrained('pessoas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
