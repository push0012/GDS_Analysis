<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiplomaRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diploma_registers', function (Blueprint $table) {
            //$table->bigIncrements('stu_id');
            $table->string('dip_title');
            $table->string('dip_medium');
            $table->string('dip_duration');
            //$table->date('dob');
            //$table->string('deg_class');
            $table->date('dip_effective_date');
            //$table->text('address');
            $table->string('dip_job_preference');
            $table->string('dip_reg_no');
            $table->date('dip_reg_date');
            $table->year('year');
            $table->char('deleted');
            $table->timestamps();
            $table->string('user');
        });

        Schema::table('diploma_registers', function (Blueprint $table) {
            $table->unsignedBigInteger('stu_id');
        
            $table->foreign('stu_id')->references('stu_id')->on('students');
        });

        Schema::table('diploma_registers', function (Blueprint $table) {
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
        Schema::dropIfExists('diploma_registers');
    }
}
