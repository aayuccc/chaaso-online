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
        Schema::create('search_logs', function (Blueprint $table) {
            $table->id();
            $table->string('term', 100);
            $table->string('ip_address', 45)->nullable();
            $table->unsignedInteger('results')->default(0);
            $table->timestamp('created_at')->useCurrent();

            // Indexing
            $table->index('created_at');
            $table->index(['term', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_logs');
    }
};
