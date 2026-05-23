<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private function generateStrongPassword($length = 20)
    {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';
        $special = '!@#$%^&*()-_=+';

        $all = $upper . $lower . $digits . $special;

        $password = '';
        $password .= $upper[random_int(0, strlen($upper) - 1)];
        $password .= $lower[random_int(0, strlen($lower) - 1)];
        $password .= $digits[random_int(0, strlen($digits) - 1)];
        $password .= $special[random_int(0, strlen($special) - 1)];

        for ($i = 4; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }

        return str_shuffle($password);
    }

    public function run(): void
    {
        $adminPassword = $this->generateStrongPassword();
        $userPassword = $this->generateStrongPassword();

        User::updateOrCreate(
            ['email' => 'testing.testing@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make($adminPassword),
            ]
        );

        User::updateOrCreate(
            ['email' => 'abdullahsaifullah988@gmail.com'],
            [
                'name' => 'Abdullah Abbasi',
                'password' => Hash::make($userPassword),
            ]
        );

        $this->command->info('====================================');
        $this->command->info('  STRONG PASSWORDS GENERATED');
        $this->command->info('====================================');
        $this->command->info('  Admin (testing.testing@gmail.com):');
        $this->command->info('  => ' . $adminPassword);
        $this->command->info('');
        $this->command->info('  User (abdullahsaifullah988@gmail.com):');
        $this->command->info('  => ' . $userPassword);
        $this->command->info('====================================');
        $this->command->info('  SAVE THESE PASSWORDS NOW!');
        $this->command->info('====================================');
    }
}
