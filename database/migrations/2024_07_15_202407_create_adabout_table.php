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
        Schema::create('adabout', function (Blueprint $table) {
            $table->id();
            $table->string('about_experience');
            $table->string('about_image');
            $table->string('about_contact');
            $table->integer('status')->comment('1 => Visible,  0 => Not Visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adabout');
    }
};
