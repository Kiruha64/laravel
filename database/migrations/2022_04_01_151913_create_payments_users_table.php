<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('payment');
            $table->unsignedBigInteger('payment_id')->nullable()->unsigned();
            $table->foreign('payment_id')->references('id')
                ->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('team_id')->nullable()->unsigned();
            $table->foreign('team_id')->references('id')
                ->on('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('payments_users');
    }
}
