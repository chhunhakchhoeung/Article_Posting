<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'f_name' => 'Chan', 'l_name' => 'Chea', 'email'=> 'superadmin@gmail.com', 'password' => bcrypt('admin@123'), 'role_id' => 1],
            ['id' => 2, 'f_name' => 'Devit', 'l_name' => 'Chea', 'email'=> 'admin@gmail.com', 'password' => bcrypt('admin@123'), 'role_id' => 2]
        ];
        
        foreach($data as $record) {
            $create = User::UpdateOrCreate(
                [
                    'id' => $record['id']
                ],
                [
                    'id' => $record['id'],
                    'f_name' => $record['f_name'],
                    'l_name' => $record['l_name'],
                    'email' => $record['email'],
                    'password' => $record['password'],
                    'role_id' => $record['role_id'],
                ]
            );
        }
    }
}
