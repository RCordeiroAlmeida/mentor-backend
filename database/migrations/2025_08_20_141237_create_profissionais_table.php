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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('servicos_id')->constrained();
            $table->string('registro_profissional');
            $table->string('cnpj');
            $table->string('telefone');
            $table->string('email');
            $table->string('endereco_consultorio');
            $table->text('disponibilidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
