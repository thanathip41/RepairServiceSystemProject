<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('name');
            $table->integer('department_id');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
            $table->integer('role_id')->default(0);
            $table->boolean('activeted')->default(1);
            $table->string('img');
        });
        // DB::table('users')->insert(
        //     array(
        //         array(
                    
        //             'department_id' => 8,'email' => 'admin@gmail.com',
        //             'id'=>'MT-0000001','name' => 'ผู้ดูแลระบบ ทดสอบ',
        //             'password' => '$2y$10$3NcymCVURBx1mIatjWW1Bu/..DcOdyRhyBzx2DuhQkQOhATC29OHy', 'role_id' => 2 ,
        //             'username'=>'admin',  'img'=>'',
        //             'created_at'=>date('Y-m-d H:i:s'),
        //             'updated_at'=>date('Y-m-d H:i:s'),
        //              )
               
        //          )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
