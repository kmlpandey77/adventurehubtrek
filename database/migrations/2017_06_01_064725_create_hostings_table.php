<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('name');
            $table->enum('package', ['Both', 'Hosting', 'Domain'])->default('Both');
            $table->enum('type', ['None', 'Host Gator', 'Host Nepal'])->default('None');
            $table->date('registered_at')->nullable();
            $table->tinyInteger('registered_for')->comment('In year');
            $table->date('expire_at')->nullable();
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
        Schema::dropIfExists('hostings');
    }
}
