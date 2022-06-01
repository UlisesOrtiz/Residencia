<?php

namespace App\Helpers;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;
use App\Constants\Constants;

class SectionHelper
{
    public function getSectionByClassId(int $myClassId)
    {
        return Section::where('my_class_id', $myClassId)->get();
    }

    public static function hasStudent($sectionId)
    {
        return Mark::where('section_id', $sectionId)->get();
    }
}
