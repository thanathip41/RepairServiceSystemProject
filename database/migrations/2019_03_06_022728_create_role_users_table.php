<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->string('id', 2)->primary();
            $table->string('role_id');
        });
        DB::table('role_user')->insert(
            array(
                array('id' => 0,'role_id' => 'ผู้ใช้งานทั่วไป'),
                array('id' => 1,'role_id' => 'ช่างซ่อมบำรุง'),
                array('id' => 2,'role_id' => 'ผู้ดูแล'),
                array('id' => 3,'role_id' => 'ลาออก'),
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
        Schema::dropIfExists('role_user');
    }
}
