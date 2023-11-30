<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         DB::table('students')->insert([
            'email' => 'dzellefaith@gmail.com',
            'student_no' => '202101350',
            'last_name' => 'binalla',
            'first_name' => 'merlin',
            'middle_name' => 'crtz',
            'maiden_name' => 'merlinmerlin',
            'pedigree' => 'Filipino',
            'biological_sex' => 'Female',
            'civil_status' => 'Singlehuhu',
            'citizenship' => 'Filipino',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Engry Birds',
            'program_code' => 'CEngryBirds',
            'degree_program' => 'Bachelor of Science in Engry Birds',
            'entry_aysem' => '2023',
            'graduation_date' => '2027-05-15',
            'year_level' => '3',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/pectureko',
            'password' => bcrypt('testtest'),

        ]);

         DB::table('students')->insert([
            'email' => 'merlindabinalla@gmail.com',
            'student_no' => '202101351',
            'last_name' => 'Swift',
            'first_name' => 'Taylor',
            'middle_name' => 'Kingsley',
            'maiden_name' => 'Taylor Swift',
            'pedigree' => 'American',
            'biological_sex' => 'Female',
            'civil_status' => 'Complicated',
            'citizenship' => 'American',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Engineering and Technology',
            'program_code' => 'BSCSg',
            'degree_program' => 'Bachelor of Science in Computer Science',
            'entry_aysem' => '2021',
            'graduation_date' => '2027-05-15',
            'year_level' => '3',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/taylorswift_photo',
            'password' => bcrypt('adminadmin'),
    ]);

         DB::table('students')->insert([
            'email' => 'chimchimmiepark@gmail.com',
            'student_no' => '20230001',
            'last_name' => 'Ishigami',
            'first_name' => 'Senku',
            'middle_name' => 'Yu',
            'maiden_name' => 'Ishigami Senku',
            'pedigree' => 'Japanese',
            'biological_sex' => 'Male',
            'civil_status' => 'Single',
            'citizenship' => 'Japanese',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Science',
            'program_code' => 'BS Bio',
            'degree_program' => 'Bachelor of Science in Biology',
            'entry_aysem' => '2022',
            'graduation_date' => '2027-05-15',
            'year_level' => '2',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/senkuphoto',
            'password' => bcrypt('20230001')

        ]);

         DB::table('students')->insert([
            'email' => 'chimchimmiepark@gmail.com',
            'student_no' => '20235002',
            'last_name' => 'Taiju',
            'first_name' => 'Oki',
            'middle_name' => 'Stone',
            'maiden_name' => 'Taiju Oki',
            'pedigree' => 'Japanese',
            'biological_sex' => 'Male',
            'civil_status' => 'Single',
            'citizenship' => 'Japanese',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Physical Therapy',
            'program_code' => 'BSPT',
            'degree_program' => 'Bachelor of Science in Physical Therapy',
            'entry_aysem' => '2022',
            'graduation_date' => '2027-05-15',
            'year_level' => '2',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/taiju_photo',
            'password' => bcrypt('20235002')
        ]);

         DB::table('students')->insert([
            'email' => 'chimchimmiepark@gmail.com',
            'student_no' => '20235003',
            'last_name' => 'Yuzuriha',
            'first_name' => 'Ogawa',
            'middle_name' => 'Stone',
            'maiden_name' => 'Yuzuriha Ogawa',
            'pedigree' => 'Japanese',
            'biological_sex' => 'Female',
            'civil_status' => 'Single',
            'citizenship' => 'Japanese',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Nursing',
            'program_code' => 'BSN',
            'degree_program' => 'Bachelor of Science in Nursing',
            'entry_aysem' => '2023',
            'graduation_date' => '2027-05-15',
            'year_level' => '2',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/yuzuriha_photo',
            'password' => bcrypt('20235003')

        ]);


         DB::table('students')->insert([
            'email' => 'chimchimmiepark@gmail.com',
            'student_no' => '20235005',
            'last_name' => 'Kohaku',
            'first_name' => 'Ruri',
            'middle_name' => 'Stone',
            'maiden_name' => 'Kohaku Ruri',
            'pedigree' => 'Japanese',
            'biological_sex' => 'Female',
            'civil_status' => 'Single',
            'citizenship' => 'Japanese',
            'student_type' => 'Undergraduate',
            'registration_status' => 'Enrolled',
            'college' => 'College of Humanities, Arts, and Social Sciences',
            'program_code' => 'BS SW',
            'degree_program' => 'Bachelor of Science in Social Work',
            'entry_aysem' => '2023',
            'graduation_date' => '2027-05-15',
            'year_level' => '2',
            'plm_email' => 'mcbinalla2021@plm.edu.ph',
            'mobile_no' => '09123456789',
            'photo_link' => 'https://example.com/kohaku_photo',
            'password' => bcrypt('20235005')
        ]);
    }
}
