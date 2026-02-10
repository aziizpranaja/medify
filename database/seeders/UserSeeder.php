<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user = [
            'password' => Hash::make('password'),
        ];

        DB::beginTransaction();
        try {
            $superadmin = User::create(array_merge([
                'email' => 'superadmin@gmail.com',
                'name' => 'superadmin',
            ], $default_user));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
