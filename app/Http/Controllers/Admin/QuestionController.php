<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionRequest;
use App\Http\Services\QuestionService;

class QuestionController extends Controller
{
    public $questionService;

    public function __construct()
    {
        $this->questionService = new QuestionService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->questionService->list($request);
        }
        $data['pageTitle'] = __("Question List");
        $data['activeQuestionMenu'] = "active";
        $data['activeQuestionSubMenu'] = "active";

        return view('admin.question.question-list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Question Edit");
        $data['question'] = $this->questionService->getById(decrypt($id));
        $data['option'] = $this->questionService->getQuestionOption(decrypt($id));

        return view('admin.question.question-edit', $data)->render();
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Question Details");
        $data['question'] = $this->questionService->getById(decrypt($id));
        $data['option'] = $this->questionService->getQuestionOption(decrypt($id));

        return view('admin.question.question-view', $data)->render();
    }

    public function store(QuestionRequest $request)
    {
        return $this->questionService->store($request);
    }

    public function destroy($id)
    {
        return $this->questionService->destroy(decrypt($id));
    }

}
