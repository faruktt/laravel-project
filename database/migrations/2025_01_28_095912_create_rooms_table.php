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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('room_no')->nullable();
            $table->string('capacity')->nullable();
            $table->string('price')->nullable();
            $table->string('view')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('roomstatuses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
