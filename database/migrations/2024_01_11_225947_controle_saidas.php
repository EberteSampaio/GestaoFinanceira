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
        Schema::create('controle_saidas', function (Blueprint $table){
                $table->id();
                $table->date('data_saida')->nullable();
                $table->string('local_visitado','200')->nullable();
                $table->unsignedFloat('valor_gasto',7,2)->nullable();
                $table->string('pagador','50')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controle_saidas');
    }
};
