<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Project extends Model
{
    //

    protected $table = 'project';
    protected $primaryKey = 'id_project';
    protected $fillable = [
        'name_project',
        'begin_date',
        'end_date',
        'proceeds',
        'id_project_manager'
    ];

    

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'id_project_manager', 'id_employee');
    }

    public function employees()
    {
        return $this->belongsToMany(
            Employee::class,
            'project_detail',
            'id_project',
            'id_employee'
        )->withPivot('working_hours');
    }
    
}
