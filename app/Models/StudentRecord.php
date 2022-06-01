<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    protected $fillable = [
        'user_id',
        'my_class_id',
        'section_id',
        'my_parent_id',
        'year',
        'period',
        'year_admitted',
        'grad',
        'grad_date'
    ];
    
    use HasFactory;

    //Belons to user with user_id
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Belogns to myclass
    public function myClass()
    {
        return $this->belongsTo(MyClass::class);
    }
    //Belongs to section
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
}
