<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionitems', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('correct_answer');
            $table->foreignId('image_id')->constrained('galleries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionitems');
    }
};
