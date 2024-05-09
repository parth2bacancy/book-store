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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 255)->default((string) str()->uuid());
            $table->string('display_id', 255)->nullable();
            $table->foreignId('book_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('books');
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('users');
            // $table->foreignId('coupon_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('coupons');
            // $table->foreignId('transaction_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->on('transactions');
            $table->integer('quantity')->default(1);
            $table->float('discount_amount', 16, 2)->default(0);
            $table->float('sub_total', 16, 2)->default(0);
            $table->float('total', 16, 2)->default(0);
            $table->enum('status', [ 'pending', 'completed', 'processing' ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
