<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Models\School;
use App\Models\Student;

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
            'criteria_name' => 'IQ',
            'criteria_code' => 'iq',
            'weight' => '0.18'
        ]);
        Criteria::create([
            'criteria_name' => 'Placement MTK',
            'criteria_code' => 'placement_mtk',
            'weight' => '0.14'
        ]);
        Criteria::create([
            'criteria_name' => 'Placement IPA',
            'criteria_code' => 'placement_ipa',
            'weight' => '0.14'
        ]);
        Criteria::create([
            'criteria_name' => 'Nilai Rapor MTK',
            'criteria_code' => 'rapor_mtk',
            'weight' => '0.18'
        ]);
        Criteria::create([
            'criteria_name' => 'Nilai Rapor IPA',
            'criteria_code' => 'rapor_ipa',
            'weight' => '0.18'
        ]);
        Criteria::create([
            'criteria_name' => 'Nilai Rapor IPS',
            'criteria_code' => 'rapor_ips',
            'weight' => '0.18'
        ]);
        School::create([
            'uuid' => Str::uuid(),
            'npsn' => '20536841',
            'school_name' => 'SMP NEGERI 03 BATU',
            'city_regency' => 'Kota Batu',
            'province' => 'Jawa Timur',
            'address' => 'Jl. Ir Soekarno No 8 Beji Junrejo'
        ]);
        School::create([
            'uuid' => Str::uuid(),
            'npsn' => '20533781',
            'school_name' => 'SMP NEGERI 1 MALANG',
            'city_regency' => 'Kota Malang',
            'province' => 'Jawa Timur',
            'address' => 'Jl. Lawu 12 Oro-oro Dowo Klojen'
        ]);
        School::create([
            'uuid' => Str::uuid(),
            'npsn' => '20536839',
            'school_name' => 'SMP NEGERI 01 BATU',
            'city_regency' => 'Kota Batu',
            'province' => 'Jawa Timur',
            'address' => 'Jl. KH Agus Salim No 55 Batu'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456789',
            'student_name' => 'Ahmad Santoso',
            'gender' => 'Laki-laki',
            'birth_place' => 'Jakarta',
            'birth_date' => '01 Januari 2005',
            'npsn' => '20533781',
            'email' => 'ahmad.santoso@gmail.com',
            'phone' => '081234567890'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456790',
            'student_name' => 'Bunga Indriani',
            'gender' => 'Perempuan',
            'birth_place' => 'Surabaya',
            'birth_date' => '15 Februari 2006',
            'npsn' => '20536841',
            'email' => 'bunga.indriani@gmail.com',
            'phone' => '082345678901'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456791',
            'student_name' => 'Candra Nugraha',
            'gender' => 'Laki-laki',
            'birth_place' => 'Bandung',
            'birth_date' => '30 Maret 2005',
            'npsn' => '20533781',
            'email' => 'candra.nugraha@gmail.com',
            'phone' => '083456789012'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456792',
            'student_name' => 'Dinda Wulandari',
            'gender' => 'Perempuan',
            'birth_place' => 'Yogyakarta',
            'birth_date' => '12 April 2004',
            'npsn' => '20536841',
            'email' => 'dinda.wulandari@gmail.com',
            'phone' => '084567890123'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456794',
            'student_name' => 'Fitria Utami',
            'gender' => 'Perempuan',
            'birth_place' => 'Makassar',
            'birth_date' => '08 Juni 2004',
            'npsn' => '20536841',
            'email' => 'fitria.utami@gmail.com',
            'phone' => '086789012345'
        ]);
        Student::create([
            'uuid' => Str::uuid(),
            'nisn' => '0123456797',
            'student_name' => 'Irfan Kurniawan',
            'gender' => 'Laki-laki',
            'birth_place' => 'Bali',
            'birth_date' => '17 September 2003',
            'npsn' => '20533781',
            'email' => 'irfan.kurniawan@gmail.com',
            'phone' => '089012345678'
        ]);
        Subcriteria::create([
            'criteria_id' => '1',
            'subcriteria_start' => '0',
            'subcriteria_end' => '65',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '1',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '1',
            'subcriteria_start' => '75',
            'subcriteria_end' => '85',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '1',
            'subcriteria_start' => '85',
            'subcriteria_end' => '99',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '1',
            'subcriteria_start' => '100',
            'subcriteria_end' => '130',
            'subcriteria_score' => '5'
        ]);
        Subcriteria::create([
            'criteria_id' => '2',
            'subcriteria_start' => '0',
            'subcriteria_end' => '50',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '2',
            'subcriteria_start' => '51',
            'subcriteria_end' => '65',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '2',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '2',
            'subcriteria_start' => '76',
            'subcriteria_end' => '85',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '2',
            'subcriteria_start' => '86',
            'subcriteria_end' => '100',
            'subcriteria_score' => '5'
        ]);
        Subcriteria::create([
            'criteria_id' => '3',
            'subcriteria_start' => '0',
            'subcriteria_end' => '50',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '3',
            'subcriteria_start' => '51',
            'subcriteria_end' => '65',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '3',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '3',
            'subcriteria_start' => '76',
            'subcriteria_end' => '85',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '3',
            'subcriteria_start' => '86',
            'subcriteria_end' => '100',
            'subcriteria_score' => '5'
        ]);
        Subcriteria::create([
            'criteria_id' => '4',
            'subcriteria_start' => '0',
            'subcriteria_end' => '50',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '4',
            'subcriteria_start' => '51',
            'subcriteria_end' => '65',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '4',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '4',
            'subcriteria_start' => '76',
            'subcriteria_end' => '85',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '4',
            'subcriteria_start' => '86',
            'subcriteria_end' => '100',
            'subcriteria_score' => '5'
        ]);
        Subcriteria::create([
            'criteria_id' => '5',
            'subcriteria_start' => '0',
            'subcriteria_end' => '50',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '5',
            'subcriteria_start' => '51',
            'subcriteria_end' => '65',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '5',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '5',
            'subcriteria_start' => '76',
            'subcriteria_end' => '85',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '5',
            'subcriteria_start' => '86',
            'subcriteria_end' => '100',
            'subcriteria_score' => '5'
        ]);
        Subcriteria::create([
            'criteria_id' => '6',
            'subcriteria_start' => '0',
            'subcriteria_end' => '50',
            'subcriteria_score' => '1'
        ]);
        Subcriteria::create([
            'criteria_id' => '6',
            'subcriteria_start' => '51',
            'subcriteria_end' => '65',
            'subcriteria_score' => '2'
        ]);
        Subcriteria::create([
            'criteria_id' => '6',
            'subcriteria_start' => '66',
            'subcriteria_end' => '75',
            'subcriteria_score' => '3'
        ]);
        Subcriteria::create([
            'criteria_id' => '6',
            'subcriteria_start' => '76',
            'subcriteria_end' => '85',
            'subcriteria_score' => '4'
        ]);
        Subcriteria::create([
            'criteria_id' => '6',
            'subcriteria_start' => '86',
            'subcriteria_end' => '100',
            'subcriteria_score' => '5'
        ]);
    }
}
