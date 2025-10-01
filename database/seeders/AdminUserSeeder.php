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
            'email' => 'roywamala3@gmail.com',
            'password' => Hash::make('W-Gx9@RmS!42zP#vTq'),
        ],
        [
            'name' => 'Bondemala Admin',
            'email' => 'bondemalainvestment@gmail.com',
            'password' => Hash::make('W-Gx9@RmS!42zP#vTq'),
        ],
    ];

    foreach ($users as $user) {
        User::updateOrCreate(
            ['email' => $user['email']], // prevent duplicates
            array_merge($user, [
                'email_verified_at' => now(), // mark as verified
            ])
        );
    }
}

}