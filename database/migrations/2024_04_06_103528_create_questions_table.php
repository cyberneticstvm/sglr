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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('management')->nullable();
            $table->string('infrastructure')->nullable();
            $table->string('infrastructure')->nullable();
            $table->string('parameter')->nullable();
            $table->text('indicator')->nullable();
            $table->smallInteger('question_group')->nullable();
            $table->text('question')->nullable();
            $table->integer('mark')->default(0);
            $table->boolean('status')->comment('1-active, 0-inactive')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
