<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatustypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status_id');
        });
        DB::table('status_type')->insert(
        array(
            array('id' => 1,'status_id' => 'อยู่ระหว่างรอคิว'),
            array('id' => 2,'status_id' => 'อยู๋ระหว่างดำเนินการ'),  
            array('id' => 3,'status_id' => 'รอยืนยันจากผู้แจ้งซ่อม'),  
            array('id' => 4,'status_id' => 'ดำเนินการเสร็จสิ้น'),  
            array('id' => 5,'status_id' => 'รอดำเนินการใหม่'),  
            array('id' => 6,'status_id' => 'รอเคลมอุปกรณ์'),  
            array('id' => 7,'status_id' => 'รอซื้ออุปกรณ์ใหม่'),  
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
        Schema::dropIfExists('status_type');
    }
}
