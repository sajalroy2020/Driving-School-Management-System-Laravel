<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ExamService;
use App\Traits\JsonResponseTrait;

class ExamController extends Controller
{
    use JsonResponseTrait;
    public $examService;

    public function __construct()
    {
        $this->examService = new ExamService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->examService->list($request);
        }
        $data['pageTitle'] = __("Exam List");
        $data['activeQuestionMenu'] = "active";
        return view('student.std-exam.list', $data);
    }

    public function view(Request $request, $id)
    {
        $data['pageTitle'] = __("Exam Details");
        $data['activeQuestionMenu'] = "active";
        $data['activeExamSubMenu'] = "active";
        $data['exam'] = $this->examService->getById(decrypt($id));
        $data['examId'] = $id;
        if ($request->ajax()) {
            return $this->examService->getMarkAssign(decrypt($id));
        }
        return view('student.std-exam.view', $data);
    }
}
