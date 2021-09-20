<?php

use App\User;
use App\Guru;
use App\Siswa;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => 1,
                'name' => 'Guru',
                'email' => 'guru@guru.com',
                'password' => bcrypt('password'),
                'role' => 'guru',
                'remember_token' => null,
            ],
            [
                'id' => 2,
                'name' => 'Siswa',
                'email' => 'siswa@siswa.com',
                'password' => bcrypt('password'),
                'role' => 'siswa',
                'remember_token' => null,
            ]
        ];

        User::insert($user);

        foreach ($user as $usr){
            if($usr['role'] == 'guru'){
                $guru = new Guru;
                $guru->user_id = $usr['id'];
                $guru->name = $usr['name'];
                $guru->status = 0;
                $guru->save();
            }else if($usr['role'] = 'siswa'){
                $siswa = new Siswa;
                $siswa->user_id = $usr['id'];
                $siswa->name = $usr['name'];
                $siswa->status = 0;
                $siswa->save();
            }
        }
    }
}
