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
        Schema::create('motherboards', function (Blueprint $table) {
            $table->id();
            $table->string('brand');                 
            $table->string('model');                 
            $table->string('chipset');      
            $table->string('socket');
            $table->string('form_factor'); 
            $table->string('memory_type');
            $table->integer('memory_slots'); 
            $table->integer('max_memory'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motherboards');
    }
};
