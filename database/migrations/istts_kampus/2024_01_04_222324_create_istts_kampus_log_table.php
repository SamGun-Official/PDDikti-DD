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
        Schema::create('istts_kampus_log', function (Blueprint $table) {
            $table->id();
            $table->string("message");
            $table->enum("action", ["INSERT", "UPDATE", "DELETE"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istts_kampus_log');
    }
};
