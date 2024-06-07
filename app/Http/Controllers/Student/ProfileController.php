<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\ProfileService;

class ProfileController extends Controller
{
    public $profileService;

    public function __construct()
    {
        $this->profileService = new ProfileService();
    }

    public function index()
    {
        $data['pageTitle'] = __("My Profile");
        $data['activeProfileMenu'] = "active";

        $data['profile'] = $this->profileService->getById(auth()->id());

        return view('student.profile.index', $data);
    }

    public function update(ProfileRequest $request)
    {
        return $this->profileService->profileUpdate($request);
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'bail|required|min:6',
        ]);
        return $this->profileService->passwordUpdate($request);
    }

}
