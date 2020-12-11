<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("memberId");
            $table->unsignedBigInteger("shoeId");
            $table->integer("totalPrice");
            $table->timestamps();
            $table->foreign("memberId")->references("id")->on("members")->onDelete("cascade");
            $table->foreign("shoeId")->references("id")->on("shoes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
