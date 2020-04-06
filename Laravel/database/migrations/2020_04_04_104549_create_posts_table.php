<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->binary('avatar')->nullable()->default(null);
            $table->string('title');
            $table->longText('content');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        DB::statement("ALTER TABLE `posts` MODIFY `avatar` LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
