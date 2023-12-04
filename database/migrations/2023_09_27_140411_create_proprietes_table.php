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
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->longText('description');
            $table->integer('surface');
            $table->integer('nombreDePiece');
            $table->integer('etage');
            $table->integer('nombreDeChambre');
            $table->integer('prix');
            $table->string('ville');
            $table->string('codePostale');
            $table->string('adresse');
            $table->boolean('vendu');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprietes');
    }
};
