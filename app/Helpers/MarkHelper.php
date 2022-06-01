<?php

namespace App\Helpers;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;
use App\Constants\Constants;

class MarkHelper
{
    public static function createStudentRecord(int $userId, int $myClassId, int $sectionId, string $period = '')
    {
        $currentYear = Date('Y');

        StudentRecord::create([
            'user_id' => $userId,
            'my_class_id' => $myClassId,
            'section_id' => $sectionId,
            'year' => $currentYear,
            'period' => $period,
            'year_admitted' => $currentYear,
        ]);
    }

    public static function updateStudentRecord(int $userId, int $sectionPromotionId)
    {
        $periods = Constants::PERIOD;
        $record = StudentRecord::where('user_id', $userId)->get()->first();
        if ($record->period == $periods[0]) {
            $period = $periods[1];
            $year = $record->year;
        } else {
            $period = $periods[0];
            $year = $record->year + 1;
        }

        $record->year = $year;
        $record->period = $period;
        $record->section_id = $sectionPromotionId;
        $record->save();

        self::createMarks(
            $userId,
            $record->my_class_id,
            $record->section_id,
            $period
        );
    }

    public static function createMarks(int $userId, int $myClassId, int $sectionId, string $period = '')
    {
        $periods = Constants::PERIOD;
        $section = Section::find($sectionId);
        $subjects = Subject::where([
            ['my_class_id', $myClassId],
            ['time', $section->time],
            ['semester', $section->semester],
        ])->get();

        $mark = Mark::where('user_id', $userId)->orderByDesc('id')->get()->first();
        $year = 0;

        if ($mark) {
            if ($mark->period == $periods[0]) {
                $period = $periods[1];
                $year = $mark->year;
            } else {
                $period = $periods[0];
                $year = $mark->year + 1;
            }
        }

        foreach ($subjects as $subject) {
            Mark::create([
                'user_id' => $userId,
                'my_class_id' => $myClassId,
                'period' => $period,
                'section_id' => $section->id,
                'subject_id' => $subject->id,
                'semester' => $subject->semester,
                'year' => $year != 0 ? $year : Date('Y'),
            ]);
        }
    }

    public static function addNewSubject(int $id, int $sectionId, int $semester)
    {
        $students = StudentRecord::where('section_id', $sectionId)->get();
        foreach ($students as $student) {
            Mark::create([
                'user_id' => $student['user_id'],
                'my_class_id' => $student['my_class_id'],
                'period' => $student['period'],
                'section_id' => $sectionId,
                'subject_id' => $id,
                'semester' => $semester,
                'year' => Date('Y'),
            ]);
        }
    }

    public static function hasStudents($sectionId){
        return Mark::where('section_id', $sectionId)->get();
    }
}
