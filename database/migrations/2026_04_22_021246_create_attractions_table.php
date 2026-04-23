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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained("zones")->onDelete("cascade");
            $table->string('name');
            $table->text('description');
            $table->string('price_range');
            $table->string('image');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
