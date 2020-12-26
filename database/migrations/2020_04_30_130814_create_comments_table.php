<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('support_ticket_id');
            $table->timestamps();
            //Los dos id que tiene un objeto son foreing keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('support_ticket_id')->references('id')->on('support_tickets_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
