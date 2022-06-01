<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Section;
use App\Models\StudentRecord;

class MarksheetController extends Controller
{
    public function student($userId)
    {
        $data['marks'] = Mark::where('user_id', $userId)->orderBy('semester')->get();
        $data['student'] = StudentRecord::where('user_id', $userId)->first();
        return view('marksheet.marksheet-student', $data);
    }

    public function section($sectionId)
    {
        $sectionData = Section::find($sectionId);
        $students = [];
        $sections = StudentRecord::where('section_id', $sectionId)->get();
        $c = 0;
        foreach ($sections as $section) {
            $students[$c]['stu'] = $section;
            $students[$c]['marks'] =
                Mark::where([
                    ['user_id', $section->user->id],
                    ['semester', $sectionData->semester]
                ])->orderBy('semester')->get();;
            $c++;
        }
        $data['students'] = $students;

        return view('marksheet.marksheet-section', $data);
    }
}
