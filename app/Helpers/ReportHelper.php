<?php

namespace App\Helpers;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;

class ReportHelper
{
    public static function sectionDataReport($sectionId, $phaseId)
    {
        $sectionFilter = Section::find($sectionId);
        $data['subjects'] = Subject::where([
            ['my_class_id', $sectionFilter->my_class_id],
            ['time', $sectionFilter->time],
            ['semester', $sectionFilter->semester]
        ])->orderBy('id')->get();


        $sectionData = Section::find($sectionId);
        $sections = StudentRecord::where('section_id', $sectionId)->get();
        $c = 0;
        $phaseName = $phaseId == 1 ? 'Primera' : ($phaseId == 2 ? 'Segunda' : 'Tercera');
        foreach ($sections as $section) {
            $data['students'][$c]['stu'] = $section;
            $data['students'][$c]['marks'] =
            Mark::where([
                ['user_id', $section->user->id],
                ['semester', $sectionData->semester]
            ])->orderBy('subject_id')->with('subject')->get();;
            $c++;
        }

        $data['sectionName'] = $sectionData->name;
        $data['phase'] = $phaseName . ' Etapa';
        $data['phaseIdFilter'] = $phaseId;

        return $data;
    }
}
