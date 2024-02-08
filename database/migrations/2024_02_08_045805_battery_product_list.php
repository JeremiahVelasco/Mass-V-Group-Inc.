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
        //
        Schema::create('battery_product_list',function(Blueprint $table){
            $table->increments('id');
            $table->string('asset');
            $table->string('mvgi_size');
            $table->string('jis_code');
            $table->string('warranty');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battery_product_list');
    }
};
