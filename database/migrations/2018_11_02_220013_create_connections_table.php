<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('user_uuid_from');
            $table->string('user_uuid_to');
            $table->string('learn_skill_uuid_from');
            $table->string('teach_skill_uuid_from');
            $table->string('email_from')->nullable();
            $table->string('email_to')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('connections');
    }
}
