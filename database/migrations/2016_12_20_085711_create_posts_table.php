<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title')->comment('Title|text');
            $table->index('post_title');
            $table->string('post_slug')->unique()->comment('Slug|text');
            $table->string('post_image')->comment('Image|image');
            $table->text('post_content')->comment('Content|ckeditor');
            $table->tinyInteger('post_status')->comment('Status|select');
            $table->string('post_mt')->comment('Meta title|text');
            $table->string('post_md')->comment('Meta description|textarea');
            $table->string('post_mk')->comment('Meta keyword|textarea');
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
        Schema::dropIfExists('posts');
    }
}
