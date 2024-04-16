<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'semester'
    ];

    public function students() {
        return $this->belongsToMany(Student::class, 'courses_has_students','course_id', 'student_id', )
            ->withPivot(['lecturer_id', 'kp'])
            ->withTimestamps();
    }
}
