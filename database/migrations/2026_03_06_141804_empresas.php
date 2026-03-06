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
        Schema::create('empresas', function (Blueprint $table) {
             $table->id('empresas_id');

            $table->string('empresas_nome');
            $table->string('empresas_cnpj')->nullable();
            $table->string('empresas_email')->nullable();
            $table->string('empresas_telefone')->nullable();

            $table->string('empresas_cidade')->nullable();
            $table->string('empresas_estado')->nullable();
            $table->string('empresas_logo')->nullable();
            $table->unsignedBigInteger('empresas_user_id');
            $table->foreign('empresas_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
