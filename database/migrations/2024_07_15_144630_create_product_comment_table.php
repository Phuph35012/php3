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
        Schema::create('product_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('userId');
            $table->string('comment',500);
            $table->timestamps();
            $table->foreign('productId')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_comment');
    }
};
