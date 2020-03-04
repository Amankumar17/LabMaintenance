<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Deadstock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadstock', function (Blueprint $table) {
            $table->string('Srno');
            $table->date('Date');
            $table->string('Name_of_Item');
            $table->string('Description');
            $table->float('Warranty');
            $table->integer('Quantity');
            $table->float('Amount');
            $table->string('GPR_Refno');
            $table->string('Supplier');
            $table->string('Billno');
            $table->date('Purchase_Date');
            $table->string('Disposal');
            $table->string('Remarks');
            $table->primary('Srno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deadstock');
    }
}
