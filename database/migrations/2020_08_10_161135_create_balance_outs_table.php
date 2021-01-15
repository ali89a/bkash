<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_outs', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('name');
            $table->string('type');
            $table->date('date');
            $table->unsignedBigInteger('creator_user_id');
            $table->foreign('creator_user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('updator_user_id')->nullable();
            $table->foreign('updator_user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('balance_outs');
    }
}
