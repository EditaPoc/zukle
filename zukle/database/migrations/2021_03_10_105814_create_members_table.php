<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name',64);
            $table->string('surname',64);
            $table->string('live',64);
            $table->tinyInteger('experiency');
            $table->tinyInteger('registered');
            $table->bigInteger('reservoir_id')->unsigned();
            $table->timestamps();
            
            $table->foreign("reservoir_id")->references("id")->on("reservoirs");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
