<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComplaintsFrequency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints_frequency', function (Blueprint $table) {
            $table->integer('srno');
            $table->integer('floor');
            $table->string('labno')->references('labno')->on('systems');
            $table->string('sysno')->references('sys')->on('systems');
            $table->string('problem');
            $table->integer('status');
            $table->dateTime('date');
            $table->integer('frequency');
            $table->string('comp_nos');
            $table->primary('srno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints_frequency');
    }
}
