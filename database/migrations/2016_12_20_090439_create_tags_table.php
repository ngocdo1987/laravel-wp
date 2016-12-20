<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag_name')->comment('Name|text');
            $table->index('tag_name');
            $table->string('tag_slug')->unique()->comment('Slug|text');
            $table->string('tag_description')->comment('Description|textarea');
            $table->string('tag_mt')->comment('Meta title|text');
            $table->string('tag_md')->comment('Meta description|textarea');
            $table->string('tag_mk')->comment('Meta keyword|textarea');
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
        Schema::dropIfExists('tags');
    }
}
