<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->binary('avatar')->nullable()->default(null);
            $table->string('name');
            $table->string('price');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId("discount_id")->constrained('discounts');
            $table->softDeletesTz();
            $table->timestampsTz();
        });

        DB::statement("ALTER TABLE `products` MODIFY `avatar` LONGBLOB");
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
