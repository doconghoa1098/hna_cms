<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code', 20);
            $table->float('price', 8, 2);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('maker_id');
            $table->text('content');
            $table->softdeletes();
            $table->timestamps();
            $table->foreign('maker_id')->references('id')->on('makers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
