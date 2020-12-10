<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id("itemId");
            $table->bigInteger("cartId")->unsigned();
            $table->bigInteger("shoeId")->unsigned();
            $table->integer("quantity");
            $table->timestamps();
            $table->foreign("cartId")->references("cartId")->on("carts")->onDelete("cascade");
            $table->foreign("shoeId")->references("shoeId")->on("shoes")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
