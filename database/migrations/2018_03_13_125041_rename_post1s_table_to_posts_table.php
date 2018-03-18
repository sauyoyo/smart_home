<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePost1sTableToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::rename('post1s', 'posts');
    }

    /**
     * Reverse the migrations.
     
     * @return void
     */
    public function down()
    {
    Schema::rename('posts', 'post1s');
    }
}
