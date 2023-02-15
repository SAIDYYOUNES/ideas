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
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments("id");
            $table->foreign('user_id')->references('id')->on('users')->onDlete('cascade');
            $table->string("nom");
            $table->string("img1");
            $table->string("img2");
            $table->string("lien_fichier");
            $table->text("description");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
