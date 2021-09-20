<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'book_user',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('book_id')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->timestamps();
                
                $table->foreign('book_id')
                    ->references('id')->on('books')
                    ->onDelete('set null');
                
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('set null');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
}
