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
            $table->string('name', 256);
            $table->integer('price')->comment('in cents');
            $table->text('description');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('status_id')->comment('FK from statuses table');
            $table->bigInteger('user_id')->comment('FK from users table');
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
        Schema::dropIfExists('products');
    }
}
