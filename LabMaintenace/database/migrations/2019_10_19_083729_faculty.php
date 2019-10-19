<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Faculty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty', function (Blueprint $table) {
            $table->string('Sdrn');
            $table->string('First_name')->nullable(false);
            $table->string('Middle_name');
            $table->string('Last_name');
            $table->bigInteger('Contact_no')->nullable(false);
            $table->string('Email')->nullable(false);
            $table->string('Desig')->nullable(false);

            $table->primary('Sdrn');
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
