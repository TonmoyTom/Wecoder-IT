<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('slug');
            $table->string('imagename');
            $table->longText('detalis');
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
        Schema::dropIfExists('leaders');
    }
}
