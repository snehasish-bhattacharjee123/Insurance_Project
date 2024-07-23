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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('Designation_title'); 
            $table->string('slider'); 
            $table->string('image'); 
            $table->string('image_social'); 
            $table->string('experience'); 
            $table->string('number'); 
            $table->string('heading_about'); 
            $table->string('highlight_description');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
