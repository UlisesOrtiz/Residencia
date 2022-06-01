<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'user_id',
        'my_class_id',
        'section_id',
        'subject_id',
        'semester',
        'year',
        'period',
        'status',
        'first_attendance',
        'first_mark',
        'second_attendance',
        'second_mark',
        'third_attendance',
        'third_mark',
        'final_mark',
        'average',
        'grade'
    ];

    use HasFactory;

    //has many user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //has many classes
    public function myClass()
    {
        return $this->belongsTo(MyClass::class);
    }

    //has many sections
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    //has many subjects
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
