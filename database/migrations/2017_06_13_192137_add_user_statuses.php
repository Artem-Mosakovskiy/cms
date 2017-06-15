<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_statuses')){
            Schema::create('user_statuses', function (Blueprint $table){
                $table->increments('id');
                $table->string('status');
            });
        }

        Schema::table('users', function (Blueprint $table){
            $table->integer('status_id')->default(2)->after('role');
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
