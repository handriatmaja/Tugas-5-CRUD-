<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use App\Models\MataKuliah;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 Dosen
        $dosens = Dosen::factory(10)->create();

        // Create 50 MataKuliah and link them to a random Dosen
        MataKuliah::factory(50)->make()->each(function ($mk) use ($dosens) {
            $mk->dosen_id = $dosens->random()->id;
            $mk->save();
        });
    }
}   