<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->longText('support');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('github')->nullable();
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
        Schema::dropIfExists('supports');
    }
}
