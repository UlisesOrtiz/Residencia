<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentRecord extends Model
{
    protected $fillable = [
        'incident_id',
        'user_id',
        'year',
        'penalty_done'
    ];
    use HasFactory;

    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }
}
