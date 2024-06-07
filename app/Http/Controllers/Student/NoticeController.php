<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Admin\NoticeRequest;
use App\Http\Services\NoticeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    public $noticeService;

    public function __construct()
    {
        $this->noticeService = new NoticeService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->noticeService->list($request);
        }
        $data['pageTitle'] = __("Notice List");
        $data['activeNoticeMenu'] = "active";
        return view('student.std-notice.list', $data);
    }

    public function details($id)
    {
        $data['pageTitle'] = __("Notice Details");
        $data['notice'] = $this->noticeService->getById(decrypt($id));
        return view('student.std-notice.details', $data)->render();;
    }

}
