<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('samll_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('orignal_price');
            $table->integer('selling_price');
            $table->integer('quality');
            $table->tinyInteger('treding')->comment('1=treding, 0=visible');
            $table->tinyInteger('status')->comment('1=hidden, 0=visible');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->foreign('category_id')->references('id')->on('add_categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
