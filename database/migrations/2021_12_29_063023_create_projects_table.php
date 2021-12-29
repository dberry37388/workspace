<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('owner_id')->constrained('users');
            $table->string('name', 75);
            $table->char('key', 10)->unique();
            $table->string('description', 1000)->nullable();
            $table->boolean('is_private')->default(false);
            $table->json('properties')->nullable();
            $table->smallInteger('order_index')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
