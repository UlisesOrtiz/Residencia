<?php

namespace App\Http\Controllers;

use App\Helpers\ReportHelper;
use App\Models\Mark;
use App\Models\StudentRecord;

class ReportController extends Controller
{
    public function index($userId)
    {
        $data['marks'] = Mark::where('user_id', $userId)->orderBy('semester')->get();
        $data['student'] = StudentRecord::where('user_id', $userId)->first();
        return view('reports.historic', $data);
    }

    public function section($sectionId, $phaseId)
    {
        $data = ReportHelper::sectionDataReport($sectionId, $phaseId);
        return view('reports.section-phase', $data);
    }

    public function sectionAttendance($sectionId, $phaseId)
    {
        $data = ReportHelper::sectionDataReport($sectionId, $phaseId);
        return view('reports.section-attendance', $data);
    }

    public function sectionFinal($sectionId, $phaseId)
    {
        $data = ReportHelper::sectionDataReport($sectionId, $phaseId);
        return view('reports.section-final', $data);
    }
}
