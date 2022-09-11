<?php

use Illuminate\Database\Seeder;
use App\LeaveType;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'name' => 'Annual Leave',
            'leave_code' => 'A001',
            'description' => 'Annual Leave for all employee',
        ]);

        LeaveType::create([
            'name' => 'Casual Leave',
            'leave_code' => 'C001',
            'description' => 'Casual Leave for all employee',
        ]);

        LeaveType::create([
            'name' => 'Sick Leave',
            'leave_code' => 'S001',
            'description' => 'Sick Leave for all employee',
        ]);
    }
}
