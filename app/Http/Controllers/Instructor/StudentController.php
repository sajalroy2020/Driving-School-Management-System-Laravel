<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\StudentService;

class StudentController extends Controller
{

    public $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService();
    }

    public function list(Request $request)
    {
        $data['pageTitle'] = __("Students List");
        $data['activeStudentMenu'] = "active";

        if ($request->ajax()) {
            return $this->studentService->list($request);
        }

        return view('Instructor.student.list', $data);
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Student Details");
        $data['activeStudentMenu'] = "active";
        $data['student'] = $this->studentService->getStudentById(decrypt($id));
        return view('Instructor.student.view', $data);
    }
}
