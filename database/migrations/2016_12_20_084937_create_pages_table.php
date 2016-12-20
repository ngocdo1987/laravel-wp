<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_title')->comment('Title|text');
            $table->index('page_title');
            $table->string('page_slug')->unique()->comment('Slug|text');
            $table->string('page_image')->comment('Image|image');
            $table->text('page_content')->comment('Content|ckeditor');
            $table->tinyInteger('page_status')->comment('Status|select');
            $table->string('page_mt')->comment('Meta title|text');
            $table->string('page_md')->comment('Meta description|textarea');
            $table->string('page_mk')->comment('Meta keyword|textarea');
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
        Schema::dropIfExists('pages');
    }
}
