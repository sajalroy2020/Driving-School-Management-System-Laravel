<?php

namespace App\Http\Services;

use App\Models\Award;
use App\Models\Package;
use App\Models\UserActivity;
use App\Models\UserDocument;
use App\Traits\JsonResponseTrait;
use Exception;
use App\Models\FileHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommonService
{
    use JsonResponseTrait;

    public function userDocumentList($request)
    {
        $getData = UserDocument::where('user_id', decrypt($request->user_id));

        return datatables($getData)
            ->addIndexColumn()
            ->addColumn('document_file', function ($getData) {
                return " <div class='flex-shrink-0 w-30 h-30 rounded-circle overflow-hidden'>
                        <a href='".getFileLink($getData->document_file_id)."' target='_blank'> <img src='" . getFileLink($getData->document_file_id) . "' alt='file' /></a>
                    </div>";
            })
            ->rawColumns(['document_file'])
            ->make(true);
    }

    public function userActivityLog($request)
    {
        $getData = UserActivity::where('user_id', decrypt($request->user_id))->orderBy('id', 'DESC');

        return datatables($getData)
            ->addIndexColumn()
            ->editColumn('created_at', function ($getData) {
                return date('Y-m-d H:i:s', strtotime($getData->created_at));
            })
            ->rawColumns(['created_at'])
            ->make(true);
    }

}
