<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'from_date',
        'to_date',
    ];

    /**
     * Get the Employee that owns the Title
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * The roles that belong to the Title
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employee()
    {
        return $this->belongsToMany(Employee::class, 'employee_title_table', 'employee_id', 'title_id');
    }
}
