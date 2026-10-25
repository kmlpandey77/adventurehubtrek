<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenewLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renew_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hosting_id');
            $table->date('renew_at');
            $table->tinyInteger('renew_for')->comment('In year');
            $table->float('cost', 8, 2);
            $table->tinyInteger('status')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renew_logs');
    }
}
