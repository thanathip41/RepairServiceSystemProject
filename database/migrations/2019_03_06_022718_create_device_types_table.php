<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('device_id');
        });
        // Insert some stuff
            DB::table('device_type')->insert(
            array(
                array('id' => 1,'device_id' => 'คอมพิวเตอร์'),
                array('id' => 2,'device_id' => 'ปริ้นเตอร์/สแกนเนอร์'),
                array('id' => 3,'device_id' => 'ระบบเครือข่าย'),
                
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
        Schema::dropIfExists('device_type');
    }
}
