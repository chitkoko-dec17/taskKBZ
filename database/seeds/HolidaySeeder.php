<?php

use Illuminate\Database\Seeder;
use App\Holiday;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Holiday::create([
            'title' => 'Full Moon Day of Waso',
            'start_date' => '2022-09-07',
            'end_date' => '2022-09-09',
        ]);

        Holiday::create([
            'title' => 'National Day',
            'start_date' => '2022-09-22',
            'end_date' => '2022-09-22',
        ]);

        Holiday::create([
            'title' => 'Labour Day',
            'start_date' => '2022-05-01',
            'end_date' => '2022-05-01',
        ]);

        Holiday::create([
            'title' => 'Martyrs Day',
            'start_date' => '2022-07-19',
            'end_date' => '2022-07-19',
        ]);
    }
}
