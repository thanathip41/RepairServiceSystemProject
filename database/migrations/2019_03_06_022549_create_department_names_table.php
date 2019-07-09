<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_name', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department_id');
        });
        DB::table('department_name')->insert(
            array(
                array('id' =>1 ,'department_id' => 'ฝ่ายขาย'),
                array('id' =>2,'department_id' =>  'ฝ่ายไอที'),
                array('id' =>3 ,'department_id' => 'ฝ่ายบุคคล'),
                array('id' =>4 ,'department_id' => 'ฝ่ายการตลาด'),
                array('id' =>5 ,'department_id' => 'ฝ่ายบริหาร'),
                array('id' =>6 ,'department_id' => 'ฝ่ายบัญชี'),
                array('id' =>7 ,'department_id' => 'ฝ่ายซ่อมบำรุง'),
                array('id' =>8 ,'department_id' => 'Admin'),
      
               
                 )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_name');
    }
}
