<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => '1',
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => '$2y$10$A7ZmUrxoPFTV/k6pPbEmI.ZJTLzApf9F.3RHui4wScb4aACm9kWPu',
            ],
        ]);
    }
}
