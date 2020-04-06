<?php

use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product::all()->each(function ($p) {
            $p->details()->save(factory(App\ProductDetail::class)->make());
            $i = random_int(1, 4);
            $max = random_int($i + 1, 6);
            for ($i; $i < $max; $i++) {
                $p->lines()->attach(App\ProductLine::find($i));
            };
        });
    }
}
