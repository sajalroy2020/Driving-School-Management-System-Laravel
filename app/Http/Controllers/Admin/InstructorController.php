<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstructorRequest;
use App\Http\Services\InstructorService;
use App\Models\Instructor;
use App\Models\UserDocument;

class InstructorController extends Controller
{
    public $instructorService;

    public function __construct()
    {
        $this->instructorService = new InstructorService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->instructorService->list();
        }
        $data['pageTitle'] = __("Instructor List");
        $data['activeInstructorMenu'] = "active";
        return view('admin.instructor.list', $data);
    }

    public function add()
    {
        $data['pageTitle'] = __("Instructor Add");
        $data['activeInstructorMenu'] = "active";
        return view('admin.instructor.add', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Instructor Edit");
        $data['activeInstructorMenu'] = "active";
        $data['instructor'] = $this->instructorService->getById(decrypt($id));
        $data['instructorContact'] = Instructor::where('user_id', decrypt($id))->first();
        $data['instructorDocument'] = UserDocument::where('user_id', decrypt($id))->get();
        return view('admin.instructor.edit', $data);
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Instructor Details");
        $data['activeInstructorMenu'] = "active";
        $data['instructor'] = $this->instructorService->getById(decrypt($id));
        return view('admin.instructor.view', $data);
    }

    public function store(InstructorRequest $request)
    {
        return $this->instructorService->store($request);
    }

    public function destroy($id)
    {
        return $this->instructorService->destroy(decrypt($id));
    }

}
