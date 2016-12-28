<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name')->comment('Name|text');
            $table->index('category_name');
            $table->string('category_slug')->unique()->comment('Slug|text');
            $table->string('category_description')->comment('Description|textarea');
            $table->integer('parent_id')->unsigned()->comment('Parent|select');
            //$table->foreign('parent_id')->references('id')->on('categories');
            $table->string('category_mt')->comment('Meta title|text');
            $table->string('category_md')->comment('Meta description|textarea');
            $table->string('category_mk')->comment('Meta keyword|textarea');
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
        Schema::dropIfExists('categories');
    }
}
