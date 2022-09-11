<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'U Hla Win',
            'department_id' => 2,
            'position_id' => 1,
            'address' => 'no.34',
            'email' => 'hlawin@test.mail',
            'status' => 1,
        ]);

        Employee::create([
            'name' => 'Mg Kyaw',
            'department_id' => 4,
            'position_id' => 4,
            'address' => 'no.32, moe kaung street.',
            'email' => 'test@mail.tl',
            'status' => 1,
        ]);

        Employee::create([
            'name' => 'Hla Hla',
            'department_id' => 2,
            'position_id' => 2,
            'address' => 'no.30, yankin township',
            'email' => 'hlahla@mail.tl',
            'status' => 1,
        ]);

        Employee::create([
            'name' => 'Ko Ko',
            'department_id' => 2,
            'position_id' => 2,
            'address' => 'no.30, yankin township',
            'email' => 'koko@mail.tl',
            'status' => 1,
        ]);

        Employee::create([
            'name' => 'Daw Hla Win',
            'department_id' => 4,
            'position_id' => 1,
            'address' => 'Nilar 3rd St., Sawbwargyi Gone Warehouses',
            'email' => 'dawhlawin@gmail.com',
            'status' => 1,
        ]);

        Employee::create([
            'name' => 'U Myo Thu',
            'department_id' => 1,
            'position_id' => 2,
            'address' => 'Sawbwargyi Gone Warehouses',
            'email' => 'myothu@gmail.com',
            'status' => 1,
        ]);
    }
}
