<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')
            ->onDelete('cascade');
            $table->string('imagename');
            $table->string('imagename2')->nullable();
            $table->longText('shottitle')->nullable();
            $table->longText('longtitle');
            $table->integer('front')->nullable()->default(0);
            $table->integer('view_count')->nullable();
            $table->integer('approve')->default(0);
            $table->integer('status')->default(0);
            $table->integer('count')->default(0);
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
