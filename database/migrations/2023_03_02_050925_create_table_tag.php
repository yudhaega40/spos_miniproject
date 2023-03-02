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
        Schema::create('tag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
        });
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('id_post');
            $table->integer('id_tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag');
        Schema::dropIfExists('post_tag');
    }
};
