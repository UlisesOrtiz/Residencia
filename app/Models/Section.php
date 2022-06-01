<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'my_class_id', 'semester', 'time'];

    use HasFactory;

    public function myClass()
    {
        return $this->belongsTo(MyClass::class);
    }
}
