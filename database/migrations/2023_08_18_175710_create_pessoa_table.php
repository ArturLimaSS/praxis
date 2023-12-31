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
        Schema::create('pessoa', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 60)->nullable(false);
            $table->integer("idade")->nullable(false);
            $table->string("email", 60)->nullable(false);
            $table->string("sexo")->nullable(true);
            $table->string("senha", 128);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pessoa');
    }
};
