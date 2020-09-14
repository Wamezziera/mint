<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
        Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('updater_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('creator_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('updater_id')->on('users')
                ->references('id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
