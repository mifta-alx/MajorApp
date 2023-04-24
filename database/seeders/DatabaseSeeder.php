<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Criteria;
use App\Models\Alternative;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'criteria_name' => 'nilai_uts',
            'criteria_label' => 'Nilai UTS',
            'weight' => '0.15'
        ]);
        Criteria::create([
            'criteria_name' => 'nilai_uas',
            'criteria_label' => 'Nilai UAS',
            'weight' => '0.15'
        ]);
        Criteria::create([
            'criteria_name' => 'nilai_un',
            'criteria_label' => 'Nilai UN',
            'weight' => '0.30'
        ]);
        Criteria::create([
            'criteria_name' => 'rata_rapor',
            'criteria_label' => 'Rata Rata Rapor',
            'weight' => '0.25'
        ]);
        Criteria::create([
            'criteria_name' => 'minat',
            'criteria_label' => 'Minat',
            'weight' => '0.15'
        ]);
    }
}
