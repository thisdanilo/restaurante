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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('legal_name');
            $table->string('trade_name');
            $table->string('cnpj');
            $table->string('im');
            $table->string('ie');
            $table->string('email');
            $table->string('phone');
            $table->boolean('active')->default(true);
            $table->foreignId('user_id')->constrained('users');
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
