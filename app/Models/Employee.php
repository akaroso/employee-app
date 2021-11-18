<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'hire_date',
    ];

    /**
     * Get all of the titles for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function title()
    {
        return $this->belongsToMany(Title::class, 'employee_title_table', 'employee_id', 'title_id');
    }

    /**
     * Get all of the salary for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }

}
