<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsertdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_repair', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('productCode')->nullable();
            $table->string('problem');
            $table->timestamps();
            $table->string('device_id');
            $table->string('repairman');
            $table->string('status_id')->default(1);;
            $table->string('method');
            $table->string('remark');
            $table->boolean('deleted')->default(0);
            $table->string('idM')->nullable();
            $table->string('img');
            $table->date('date_return');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_repair');
    }
}
