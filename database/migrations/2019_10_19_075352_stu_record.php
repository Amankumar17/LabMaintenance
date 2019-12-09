<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StuRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stu_record', function (Blueprint $table) {
            $table->string('Roll_no');
            $table->integer('Serial_no');
            $table->string('Last_name');
            $table->string('First_name');
            $table->string('Middle_name');
            $table->string('Year');
            $table->string('Division');
            $table->string('Batch');
            $table->bigInteger('Phone_no')->nullable(false);
            $table->string('emailid')->nullable(false);
            $table->integer('sem')->nullable(false);

            $table->primary('Roll_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
