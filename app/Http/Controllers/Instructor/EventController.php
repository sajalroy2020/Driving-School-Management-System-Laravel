<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\EventService;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
{
    public $eventService;

    public function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->eventService->list($request);
        }
        $data['pageTitle'] = __("Event List");
        $data['activeEventMenu'] = "active";

        return view('Instructor.event.index', $data);
    }

    public function view($id)
    {
        $data['activeEventMenu'] = "active";
        $data['pageTitle'] = __("Event Details");
        $id = Crypt::decryptString($id);
        $data['event'] = $this->eventService->getById($id);

        return view('Instructor.event.details', $data);
    }

}
