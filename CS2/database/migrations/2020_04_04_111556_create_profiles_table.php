<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->binary('avatar')->nullable()->default(null);
            $table->string('phone');
            $table->string('address');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        DB::statement("ALTER TABLE `profiles` MODIFY `avatar` LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
