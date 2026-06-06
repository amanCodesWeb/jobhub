<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create categories first
        $this->call(CategorySeeder::class);

        // ── Admin user ────────────────────────────────────
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name'  => 'User',
            'email'      => 'admin@admin.com',
            'password'   => Hash::make('12345'),
        ]);
        $admin->is_admin = true;
        $admin->save();

        $this->command->info('Admin user created: admin@admin.com / 12345');

        // ── Regular user ───────────────────────────────────
        $user = User::create([
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'user@user.com',
            'password'   => Hash::make('12345'),
        ]);

        $this->command->info('Regular user created: user@user.com / 12345');

        // ── Sample jobs ────────────────────────────────────
        // Admin's posts (automatically approved)
        Job::factory()->count(10)->create([
            'user_id' => $admin->id,
        ]);

        // Regular user's posts (pending — waiting for approval)
        Job::factory()->pending()->count(5)->create([
            'user_id' => $user->id,
        ]);

        $this->command->info('15 sample job listings created (10 approved, 5 pending).');
    }
}
