<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('stu_id');
            $table->string('stu_title');
            $table->string('stu_name');
            $table->string('sex');
            $table->date('dob');
            $table->string('nic');
            $table->text('address');
            $table->string('telephone');
            $table->string('email');
            $table->char('deleted');
            $table->timestamps();
            $table->string('user');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('ds_id');
        
            $table->foreign('ds_id')->references('ds_id')->on('districts');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('dv_id');
        
            $table->foreign('dv_id')->references('dv_id')->on('divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
