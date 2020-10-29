<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Super Admin', 'detail' => 'Super Admin Role'],
            ['id' => 2, 'name' => 'Admin', 'detail' => 'Admin Role']
        ];
        
        foreach($data as $record) {
            $create = Role::UpdateOrCreate(
                [
                    'id' => $record['id']
                ],
                [
                    'id' => $record['id'],
                    'name' => $record['name'],
                    'detail' => $record['detail'],
                ]
            );
        }
    }
}
