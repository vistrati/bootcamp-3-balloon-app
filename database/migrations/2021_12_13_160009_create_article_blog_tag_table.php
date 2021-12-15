<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_blog_tag', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained('articles')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('blog_tag_id')->constrained('blog_tags')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->primary(['article_id', 'blog_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_blog_tag');
    }
}
