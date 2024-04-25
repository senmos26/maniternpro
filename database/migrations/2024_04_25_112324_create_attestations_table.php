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
        Schema::create('attestations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stagiaire_id');
            $table->unsignedBigInteger('stage_id');
            $table->boolean('statut');
            $table->unsignedBigInteger('bureau_id');
            $table->unsignedBigInteger('service_id');
            $table->dateTime('date_prise');
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('bureau_id')->references('id')->on('bureaus');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestations');
    }
};
