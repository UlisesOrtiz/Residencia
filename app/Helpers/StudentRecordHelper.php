<?php

namespace App\Helpers;

use App\Models\StudentRecord;

class StudentRecordHelper
{
    public static function hasStudents($sectionId)
    {
        return StudentRecord::where('section_id', $sectionId)->get();
    }
}
