<?php

namespace Database\Seeders;

use App\Models\Domaine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domaine::create(['nom' => 'Couture', 'slug' => strtolower(Str::slug('Couture','-'))]);
        Domaine::create(['nom' => 'Immobilier', 'slug' => strtolower(Str::slug('Immobilier','-'))]);
        Domaine::create(['nom' => 'Commerce-Bio', 'slug' => strtolower(Str::slug('Commerce-Bio','-'))]);
        Domaine::create(['nom' => 'Commerce-Vetements', 'slug' => strtolower(Str::slug('Commerce-Vetements','-'))]);
    }
}
