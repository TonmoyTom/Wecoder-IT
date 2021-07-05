<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adforms', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('mother_name');
            $table->string('father_name');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')
            ->onDelete('cascade');
            $table->string('present_address');
            $table->string('permant_address')->nullable(); 
            $table->string('ssc');
            $table->string('sscyear');
            $table->string('hsc')->nullable();
            $table->string('hscyear')->nullable();
            $table->string('office_address')->nullable();
            $table->string('nationalid')->nullable();
            $table->string('occpation');
            $table->string('year');
            $table->string('country');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('gradiuannmber')->nullable();
            $table->string('guradianrltn')->nullable();
            $table->string('refname')->nullable();
            $table->string('refphone')->nullable();
            $table->string('batch')->nullable();
            $table->string('retnstudent')->nullable();
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
        Schema::dropIfExists('adforms');
    }
}
