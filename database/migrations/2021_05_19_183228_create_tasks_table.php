<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned(); // для хранения пользователя, к которому относится задача
            $table->string('title');
            $table->string('description');
            $table->boolean('done', false);
            $table->timestamps();
            $table->string('team_1');
            $table->integer('match_id');
            $table->string('team_2');
            $table->string('team_name');
            $table->integer('points');
            $table->string('email');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }

}
