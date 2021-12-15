<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('articles');
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('author_id')->constrained('users')
                ->onDelete('RESTRICT')
                ->onUpdate('CASCADE');
            $table->string('image');
            $table->dateTime('published_at')->nullable();
            $table->tinyText('excerpt');
            $table->foreignId('category_id')->constrained('blog_categories')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->string('seo_title');
            $table->string('seo_description');
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
        Schema::dropIfExists('articles');
    }
}
