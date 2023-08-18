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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->integer("tipo_logradouro_id")->nullable(false);
            $table->integer("cidade_id")->nullable(false);
            $table->integer("pessoa_id")->nullable(false);
            $table->string("logradouro", 200)->nullable(false);
            $table->integer("numero")->nullable(false);
            $table->integer("cep")->nullable(false);
            $table->string("bairro", 60)->nullable(true);
            $table->foreign("tipo_logradouro_id")->references("id")->on("tipo_logradouro")->onDelete("restrict")->onUpdate("restrict");
            $table->foreign("cidade_id")->references("id")->on("cidade")->onDelete("restrict")->onUpdate("restrict");
            $table->foreign("pessoa_id")->on("id")->references("pessoa")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco');
    }
};
