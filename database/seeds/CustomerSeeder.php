<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user) {
            factory(Customer::class, 500)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
