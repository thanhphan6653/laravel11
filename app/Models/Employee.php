<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
// class Employee extends Model
class Employee extends Authenticatable
{
    //

    protected $table = "employee";
    protected $primaryKey = 'id_employee';
    protected $guard = 'employee';

    protected $fillable = [

        'employee_name',
        'username',
        'email',
        'password',
        'phone_number',
        'address',
        'salary',
        'gender',
        'date_of_birth',
        'join_date',
        'id_employee_manager',
        'id_department'
    ];

    public function department(): BelongsTo{
        return $this->belongsTo(Department::class, 'id_department', 'id_department');
    }

    

    public function manager()
    {
        return $this->belongsTo(self::class, 'id_employee_manager', 'id_employee');
    }

    public function managedProjects()
    {
        return $this->hasMany(Project::class, 'id_project_manager', 'id_employee');
    }

    public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            'project_detail',
            'id_employee',
            'id_project'
        )->withPivot('working_hours');
    }

    

}
