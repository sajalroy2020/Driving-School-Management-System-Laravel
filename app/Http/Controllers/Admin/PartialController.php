<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\PartialService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AwardRequest;
use App\Http\Services\AwardService;

class PartialController extends Controller
{
    public $partialService;

    public function __construct()
    {
        $this->partialService = new PartialService();
    }

    public function documentSectionContent()
    {
        return $this->partialService->documentSectionContent();
    }

}
