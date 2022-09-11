<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department_id', 'position_id', 'address', 'email', 'status'
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class, 'employee_id', 'id');
    }
}
