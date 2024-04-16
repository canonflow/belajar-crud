<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'nrp'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function consultations() {
        return $this->hasMany(Consultation::class, 'student_id');
    }

    public function courses() {
        return $this->belongsToMany(Course::class, 'courses_has_students', 'student_id', 'course_id')
            ->withPivot(['lecturer_id', 'kp'])
            ->withTimestamps();
    }

}
