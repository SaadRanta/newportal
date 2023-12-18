<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            [
                'name'=>'KhalidRasheed',
                'email'=>'khalid@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'teacher',
                'status'=>'active',
            ],
            [
                'name'=>'ZehraZaidi',
                'email'=>'zehra@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'teacher',
                'status'=>'active',
            ],
            [
                'name'=>'Zaidi',
                'email'=>'Zaidi@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'teacher',
                'status'=>'active',
            ],
            [
                'name'=>'AdeelAhmed',
                'email'=>'adeel@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'teacher',
                'status'=>'active',
            ],
            [
                'name'=>'HabibaFaisal',
                'email'=>'habiba@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'teacher',
                'status'=>'active',
            ],
            
            [
                'name'=>'SaadQasim',
                'email'=>'saad@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'student',
                'status'=>'active',
            ],
            [
                'name'=>'Mehdi',
                'email'=>'mehdi@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'student',
                'status'=>'active',
            ],
            [
                'name'=>'Ayan',
                'email'=>'ayan@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'student',
                'status'=>'active',
            ],
            [
                'name'=>'Wahaj',
                'email'=>'wahaj@gmail.com',
                'password'=>Hash::make ('karachi123'),
                'role'=>'student',
                'status'=>'active',
            ],

        ]);
        DB::table('teachers')->insert([

            [
                'name'=>'KhalidRasheed',
                'email'=>'khalid@gmail.com',
                'course'=>'SCD',
                'status'=>'active',
            ],
            [
                'name'=>'ZehraZaidi',
                'email'=>'zehra@gmail.com',
                'course'=>'AP',
                'status'=>'active',
            ],
            [
                'name'=>'Zaidi',
                'email'=>'zaidi@gmail.com',
                'course'=>'NC',
                'status'=>'active',
            ],
            [
                'name'=>'AdeelAhmed',
                'email'=>'adeel@gmail.com',
                'course'=>'FOP',
                'status'=>'active',
            ],[
                'name'=>'HabibaFaisal',
                'email'=>'Habiba@gmail.com',
                'course'=>'SCD',
                'status'=>'active',
            ],

        ]);
    
    DB::table('marks')->insert([
        ['studentname'=>'SaadQasim','course'=>'SCS','quiz_marks'=>8, 'student_id'=> 6,'cheating'=>false,'teacher_id'=> 1],
        ['studentname'=>'Mehdi','course'=>'SCS','quiz_marks'=>0, 'student_id'=> 7,'cheating'=>true,'teacher_id'=> 1],
        ['studentname'=>'Ayan','course'=>'SCS','quiz_marks'=>7, 'student_id'=> 8,'cheating'=>false,'teacher_id'=> 1],


    ]);
}

}
