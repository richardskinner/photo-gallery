<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Richard Skinner',
            'email' => 'richard.skinner@gunpowderdigital.com',
            'email_verified_at' => Carbon::now()->unix(),
            'password' => crypt('password', 'test'),
        ]);
        User::factory()->create();
    }
}
