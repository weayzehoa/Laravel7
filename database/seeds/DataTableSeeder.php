<?php

use Illuminate\Database\Seeder;

use App\User as UserEloquent;
use App\Student as StudentEloquent;
use App\Score as ScoreEloquent;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = UserEloquent::create([
            'name' => '小明',
            'email' => 'min@mail.com',
            'password' => bcrypt('abc123')
        ]);
        $student = StudentEloquent::create([
            'user_id' => $user->id,
            'no' => 's1234567890',
            'tel' => '0912345678'
        ]);
        $score = ScoreEloquent::create([
            'student_id' => $student->id,
            'chinese' => 60,
            'english' => 60,
            'math' => 60,
            'total' => 180
        ]);
    }
}
