<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function consultations() {
        return $this->hasMany(Consultation::class, 'student_id');
    }
}
