<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SystemLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_logs', function (Blueprint $table) {
            $table->bigIncrements('srno');
            $table->string('lab_source')->references('labno')->on('systems');
            $table->string('sysno_source');
            $table->string('lab_target')->references('labno')->on('systems');
            $table->string('sysno_target');
            $table->string('admin')->references('username')->on('admin_login');;
            $table->string('action');
            $table->date('Date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_logs');
    }
}
