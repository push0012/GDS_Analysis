<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreeRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degree_registers', function (Blueprint $table) {
            //$table->bigIncrements('stu_id');
            $table->string('deg_title');
            $table->string('deg_medium');
            $table->string('deg_type');
            //$table->date('dob');
            $table->string('deg_class');
            $table->date('deg_effective_date');
            //$table->text('address');
            $table->string('deg_job_preference');
            $table->string('deg_reg_no');
            $table->date('deg_reg_date');
            $table->year('year');
            $table->char('deleted');
            $table->timestamps();
            $table->string('user');
        });

        Schema::table('degree_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('stu_id');
        
            $table->foreign('stu_id')->references('stu_id')->on('students');
        });

        Schema::table('degree_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('str_id');
        
            $table->foreign('str_id')->references('str_id')->on('streams');
        });

        Schema::table('degree_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('ins_id');
        
            $table->foreign('ins_id')->references('ins_id')->on('institutes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degree_registers');
    }
}
