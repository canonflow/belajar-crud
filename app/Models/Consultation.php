<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'lecturer_id',
        'desc'
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function lecturer() {
        return $this->belongsTo(Lecturer::class, 'student_id');
    }
}
