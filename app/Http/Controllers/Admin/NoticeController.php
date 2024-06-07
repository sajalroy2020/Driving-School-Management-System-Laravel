<?php

namespace App\Http\Controllers\Admin;

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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->noticeService->list($request);
        }
        $data['pageTitle'] = __("Notice List");
        $data['activeNoticeMenu'] = "active";
        return view('admin.notice.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Notice Edit");
        $data['notice'] = $this->noticeService->getById(decrypt($id));
        return view('admin.notice.edit', $data)->render();
    }

    public function details($id)
    {
        $data['pageTitle'] = __("Notice Details");
        $data['notice'] = $this->noticeService->getById(decrypt($id));
        return view('admin.notice.details', $data)->render();;
    }

    public function store(NoticeRequest $request)
    {
        return $this->noticeService->store($request);
    }

    public function destroy($id)
    {
        return $this->noticeService->destroy(decrypt($id));
    }

}
