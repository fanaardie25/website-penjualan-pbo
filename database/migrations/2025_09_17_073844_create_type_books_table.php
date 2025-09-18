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
        Schema::create('type_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->timestamps();

              $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_books');
    }
};
