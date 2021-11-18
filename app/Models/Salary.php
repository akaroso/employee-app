<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_date',
        'to_date',
        'salary',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
