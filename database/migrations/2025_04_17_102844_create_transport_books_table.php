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
        Schema::create('transport_books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->date('required_date');
            $table->integer('duration');
            $table->string('goods_type');
            $table->text('additional_details')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_books');
    }
};
