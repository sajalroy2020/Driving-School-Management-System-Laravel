<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExamRequest;
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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->examService->list($request);
        }
        $data['pageTitle'] = __("Exam List");
        $data['activeQuestionMenu'] = "active";
        $data['activeExamSubMenu'] = "active";
        $data['question'] = $this->examService->getQuestion();
        $data['package'] = $this->examService->getPackage();
        return view('Instructor.exam.list', $data);
    }

    public function getStudent(Request $request)
    {
        $data['allStudent'] = $this->examService->getStudent($request->id);
        return view('Instructor.exam.student-dropdown', $data)->render();
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Exam Edit");
        $data['exam'] = $this->examService->getById(decrypt($id));
        $data['question'] = $this->examService->getQuestion();
        $data['student'] = $this->examService->getStudent($data['exam']->package_id);
        $data['package'] = $this->examService->getPackage();

        return view('Instructor.exam.edit', $data)->render();
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Exam Details");
        $data['activeQuestionMenu'] = "active";
        $data['activeExamSubMenu'] = "active";
        $data['exam'] = $this->examService->getById(decrypt($id));
        if ($data['exam']->exam_type == EXAM_TYPE_THEORETICAL) {
            $idArray = json_decode($data['exam']->question_assign);
            $data['question'] = $this->examService->getQuestionByTrashed($idArray);
        }
        return view('Instructor.exam.view', $data);
    }

    public function print($id)
    {
        $data['exam'] = $this->examService->getById(decrypt($id));
        if ($data['exam']->exam_type == EXAM_TYPE_THEORETICAL) {
            $idArray = json_decode($data['exam']->question_assign);
            $data['question'] = $this->examService->getQuestionByTrashed($idArray);
        }
        return view('Instructor.exam.print', $data);
    }

    public function markAssign(Request $request, $id)
    {
        $data['pageTitle'] = __("Mark Assign");
        $data['activeQuestionMenu'] = "active";
        $data['activeExamSubMenu'] = "active";
        $data['exam'] = $this->examService->getById(decrypt($id));
        $data['examId'] = $id;
        if ($request->ajax()) {
            return $this->examService->getMarkAssign(decrypt($id));
        }
        return view('Instructor.exam.mark-assign', $data);
    }

    public function markAssignEdit($id)
    {
        $data['pageTitle'] = __("Mark Assign");
        $data['marking'] = $this->examService->getMarkAssignId(decrypt($id));

        return view('Instructor.exam.mark-assign-model', $data)->render();
    }

    public function markUpdate(Request $request)
    {
        return $this->examService->markAssignUpdate($request);
    }

    public function store(ExamRequest $request)
    {
        return $this->examService->store($request);
    }

    public function destroy($id)
    {
        return $this->examService->destroy(decrypt($id));
    }

}
