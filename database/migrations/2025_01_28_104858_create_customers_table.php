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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('job')->nullable();
            $table->text('address');
            $table->integer('persons');
            $table->date('from_date');
            $table->date('until_date');
            $table->foreignId('room_id')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->decimal('payment', 10, 2);
            $table->decimal('insufficient_balance', 10, 2)->default(0); // Fixed
            $table->enum('status', ['pending', 'confirmed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
