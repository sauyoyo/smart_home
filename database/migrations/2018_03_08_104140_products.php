<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prpducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191);
            $table->text('description');
            $table->integer('status');
            $table->integer('type_id')->unsigned();
            $table->integer('qty');
            $table->integer('brand_id')->unsigned();
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
        Schema::dropIfExists('prpducts');
    }
}
