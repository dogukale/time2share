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
            $table->string('description');
            $table->string('img_name');
            $table->string('img_path')->default('/uploads/placeholder.png');
            $table->string('img_path_2')->nullable();
            $table->string('img_path_3')->nullable();
            $table->string("category")->references("category")->on("category");
            $table->date('deadline');
            $table->string('owner')->references("id")->on("users");
            $table->boolean('loaned')->default(false);
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
