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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_title');
            $table->string('complaint_type');
            $table->string('complaint_status')->nullable();
            $table->string('address');
            $table->string('district')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('image')->nullable();
            $table->string('location_link')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
