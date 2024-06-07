<?php

namespace App\Http\Controllers\Instructor;

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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->noticeService->list($request);
        }
        $data['pageTitle'] = __("Notice List");
        $data['activeNoticeMenu'] = "active";
        return view('Instructor.notice.list', $data);
    }

    public function details($id)
    {
        $data['pageTitle'] = __("Notice Details");
        $data['notice'] = $this->noticeService->getById(decrypt($id));
        return view('Instructor.notice.details', $data)->render();;
    }
}
