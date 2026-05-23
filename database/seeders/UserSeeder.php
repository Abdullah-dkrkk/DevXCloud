<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminPassword = "YbClU;9mtD@9Va8w'CKdxNcudVc";
        $userPassword = "{]n'Hg6{mziM%PX}VYCC4p+]mdq";

        User::where('email', 'testing.testing@gmail.com')->delete();

        User::updateOrCreate(
            ['email' => 'admin@devxcloud.com'],
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
        $this->command->info('  PASSWORDS UPDATED');
        $this->command->info('====================================');
        $this->command->info('  Admin (admin@devxcloud.com):');
        $this->command->info('  => ' . $adminPassword);
        $this->command->info('');
        $this->command->info('  User (abdullahsaifullah988@gmail.com):');
        $this->command->info('  => ' . $userPassword);
        $this->command->info('====================================');
    }
}
