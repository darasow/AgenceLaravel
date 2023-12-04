<?php

use App\Models\Option;
use App\Models\Propriete;
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
        Schema::create('option_propriete', function (Blueprint $table) {
           $table->foreignIdFor(Option::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreignIdFor(Propriete::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
           $table->primary(['option_id', 'propriete_id']);
           $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_propriete');
    }
};
