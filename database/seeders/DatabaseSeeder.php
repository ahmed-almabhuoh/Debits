<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('settings')->insert([
            [
                'key' => 'supported_currencies',
                'value' => json_encode(['NIS', 'USD', 'EUR', 'GBP', 'JPY', 'CAD']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'default_currency',
                'value' => 'NIS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
