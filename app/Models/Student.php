<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function details()
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'student_club');
    }
}
