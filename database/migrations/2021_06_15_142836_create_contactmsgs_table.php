<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactmsgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactmsgs', function (Blueprint $table) {
            $table->id();
            $table->longText('address');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email');
            $table->string('email2')->nullable();
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
        Schema::dropIfExists('contactmsgs');
    }
}
