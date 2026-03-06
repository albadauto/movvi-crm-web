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
        Schema::create('tenant', function (Blueprint $table) {
            $table->id('tenant_id');
            $table->string('tenant_name');
            $table->date('tenant_trials_end');
            $table->boolean('tenant_is_active');
            $table->unsignedBigInteger('tenant_user_id');
            $table->foreign('tenant_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tenant');
    }
};
