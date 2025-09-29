<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ronald Jjuuko',
                'email' => 'ronaldjjuuko7@gmail.com',
                'password' => Hash::make('88928892'), // change to strong password
            ],
            [
                'name' => 'Wamala Roy',
                'email' => 'wamalaroy3@gmail.com',
                'password' => Hash::make('admin@BISL2025'),
            ],
            [
                'name' => 'System Admin',
                'email' => 'admin@bisl.com',
                'password' => Hash::make('88928892'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // prevent duplicates
                $user
            );
        }
    }
}