<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->profile()->save(factory(App\Profile::class)->make());
            $u->roles()->attach(App\Role::find(random_int(1, App\Role::count())));
            $u->orders()->create();
            foreach ($u->roles as $role) {
                if ($role->name != 'customer') {
                    for ($i = 1; $i < mt_rand(2, 10); $i++) {
                        $u->posts()->save(factory(App\Post::class)->make());
                    }
                    for ($i = 1; $i < mt_rand(2, 15); $i++) {
                        $u->products()->save(factory(App\Product::class)->make());
                    }
                    break;
                }
            }
        });
    }
}
