<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_desc')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=visible','1=hidden');
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
        Schema::dropIfExists('add_categories');
    }
}
