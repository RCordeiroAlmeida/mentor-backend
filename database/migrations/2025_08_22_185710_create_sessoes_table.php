<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_id')->constrained('plano_acompanhamento');
            $table->dateTime('data_hora_inicio');
            $table->dateTime('data_hora_fim');
            $table->text('observacao')->nullable();
            $table->integer('status')->default(1); // 1 = ativo, 0 = inativo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessoes');
    }
};
