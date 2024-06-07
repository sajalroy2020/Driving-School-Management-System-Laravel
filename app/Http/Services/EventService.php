<?php

namespace App\Http\Services;

use App\Models\Event;
use App\Traits\JsonResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\FileHandler;
use Illuminate\Support\Facades\Crypt;

class EventService
{
    use JsonResponseTrait;

    public function list()
    {
        return Event::where('tenant_id', auth()->user()->tenant_id)->get()->map(function ($event) {
            $event->encrypted_id = Crypt::encryptString($event->id);
            return $event;
        });
    }

    public function getById($id)
    {
        return Event::find($id);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $id = $request->get('id', 0);
            $authUser = auth()->user();

            if ($id != 0) {
                $id = decrypt($id);
                $event = Event::find($id);
                $msg = __(MSG_UPDATED_SUCCESSFULLY);
            } else {
                $event = new Event();
                $msg = __(MSG_CREATED_SUCCESSFULLY);
            }

            if ($request->hasFile('image')) {
                $new_file = new FileHandler();
                $uploaded = $new_file->upload('event', $request->image);
                $event->image = $uploaded->id;
            }

            $event->event_title = $request->event_title;
            $event->date_time = $request->date_time;
            $event->location = $request->location;
            $event->description = $request->description;
            $event->status = isset($request->status) ? $request->status : STATUS_ACTIVE;
            $event->tenant_id = $authUser->tenant_id;
            $event->save();

            DB::commit();
            return $this->successResponse([], $msg);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $event = Event::find($id);
            $event->delete();
            DB::commit();
            return $this->successResponse([], __(MSG_DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse([], __(MSG_SOMETHING_WENT_WRONG));
        }
    }

}
