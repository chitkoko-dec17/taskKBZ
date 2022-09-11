<?php

namespace App\Exports;

use App\Leave;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeavesExport implements FromArray, WithHeadings
{
    protected $leaves;

    public function __construct(array $leaves)
    {
        $this->leaves = $leaves;
    }

    public function headings(): array
    {
        return [
            'Employee',
            'Leave Type',
            'Start Date',
            'End Date',
            'Reason',
        ];
    }

    public function array(): array
    {
        return $this->leaves;
    }
}