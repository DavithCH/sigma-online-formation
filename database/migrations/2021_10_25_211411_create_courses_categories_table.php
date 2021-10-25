<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('courses_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->foreign('courses_id')
                  ->references('id')
                  ->on('courses')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_categories');
    }
}
