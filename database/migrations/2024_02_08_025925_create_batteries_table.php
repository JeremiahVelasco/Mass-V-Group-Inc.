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
        Schema::create('batteries', function (Blueprint $table) {
            $table->id();
            
            $table->string('image');
            $table->string('name');
            $table->string('mvgi');
            $table->string('jis_type');
            $table->string('warranty');
            $table->string('description1');
            $table->string('description2');
            $table->string('description3');
            $table->integer('saved_slot');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batteries');
    }
};
