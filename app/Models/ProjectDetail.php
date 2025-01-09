<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    //

    protected $table = 'project_detail';
    protected $primaryKey = 'id_project_detail';
    protected $fillable = [
        'id_project',
        'id_employee',
        'working_hours'
    ];

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id_employee', 'id_employee');
    }
}
