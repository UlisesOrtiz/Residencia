<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //fillable
    protected $fillable = [
        'name',
        'slug',
        'time',
        'my_class_id',
        'section_id',
        'teacher_id',
        'semester',
        'status'
    ];

    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function myClass()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function section()
    {
        return $this->belongsTo(MyClass::class);
    }
}
