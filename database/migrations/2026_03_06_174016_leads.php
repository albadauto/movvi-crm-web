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
        Schema::create('leads', function (Blueprint $table) {
           $table->id('leads_id');
           $table->string('leads_nome');
           $table->string('leads_cpf');
           $table->string('leads_email');
           $table->string('leads_whatsapp');
           $table->unsignedBigInteger('leads_empresa_id');
           $table->foreign('leads_empresa_id')->references('empresas_id')->on('empresas');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
