<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->uuid()->default((string) str()->uuid());
            $table->foreignId('author_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('users');
            $table->string('name', 128)->nullable();            
            $table->string('description', 255)->nullable();
            $table->string('cover', 255)->nullable();
            $table->boolean('active')->default(false);
            $table->float('price', 16,2)->default(0);
            $table->timestamps();
            $table->index(['author_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
