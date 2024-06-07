<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\StudentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\UserContact;
use App\Models\UserDocument;

class StudentController extends Controller
{
    public $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->studentService->list();
        }
        $data['pageTitle'] = __("Student List");
        $data['activeStudentMenu'] = "active";
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['pageTitle'] = __("Student Add");
        $data['activeStudentMenu'] = "active";
        return view('admin.student.add', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Student Edit");
        $data['activeStudentMenu'] = "active";
        $data['student'] = $this->studentService->getStudentById(decrypt($id));
        $data['studentContact'] = UserContact::where('user_id', decrypt($id))->first();
        $data['studentDocument'] = UserDocument::where('user_id', decrypt($id))->get();
        return view('admin.student.edit', $data);
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Student Profile");
        $data['activeStudentMenu'] = "active";
        $data['student'] = $this->studentService->getStudentById(decrypt($id));
        return view('admin.student.view', $data);
    }

    public function store(StudentRequest $request)
    {
        return $this->studentService->store($request);
    }

    public function destroy($id)
    {
        return $this->studentService->destroy(decrypt($id));
    }

}
