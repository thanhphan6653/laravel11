<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    //

    protected $table = 'department';
    protected $primaryKey = 'id_department';
    protected $fillable = [
        'department_name',
        'id_head_of_department',
        'day_take'
    ];

    public function head(){
        return $this->belongsTo(Employee::class, 'id_head_of_department', 'id_employee' );
    }

    public function employees(): Hasmany
    {
        return $this->hasMany(Employee::class, 'id_department', 'id_department');
    }
}
