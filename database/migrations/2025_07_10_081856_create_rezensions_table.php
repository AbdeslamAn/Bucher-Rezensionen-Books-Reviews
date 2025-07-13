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
        Schema::create('rezensions', function (Blueprint $table) {
            $table->id();

            

            $table->text('rezension');
            $table->unsignedTinyInteger('bewertung');

            $table->timestamps();

            $table->foreignId('buch_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rezensions');
    }
};
