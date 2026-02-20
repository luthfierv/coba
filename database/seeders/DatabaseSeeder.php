<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@bnpb.local'],
            [
                'name' => 'Admin BNPB',
                'password' => 'admin12345',
                'is_admin' => true,
            ]
        );

        $this->call([
            ArtikelSeeder::class,
            RelawanSeeder::class,
        ]);

        User::factory()->create();
    }
}
