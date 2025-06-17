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
        Schema::create('my_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained('users')->cascadeOnDelete();
            $table->foreignId("book_id")->constrained("books")->cascadeOnDelete();
            $table->integer('current_Page');
            $table->boolean('isFinished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_books');
    }
};
