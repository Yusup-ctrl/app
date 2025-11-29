<?php

use App\CpuBrand;
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
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();
            $table->enum('brand',array_column(CpuBrand::cases(), 'value'));
            $table->string('model');
            $table->string('socket');
            $table->boolean('is_unlocked');
            $table->float('base_clock'); // in GHz
            $table->float('boost_clock'); // in GHz
            $table->integer('cores');
            $table->integer('threads');
            $table->integer('tdp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpus');
    }
};
