<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\CommonEmailHandler;
use App\Models\EmailAndNotificationTemplate;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        try {
            $this->sendForgotMail($request->email);
            return back()->with('success', __('We have mailed your password reset link!'));
        } catch (Exception $e) {
            dd($e);
            return back()->with('error', __(SOMETHING_WENT_WRONG));
        }
    }

    public function forgetVerifyForm($token, $email)
    {
        $resetPassword = DB::table('password_resets')->where('token', $token)->where('email', $email)->first();
        return view('auth.passwords.reset', compact('token', 'resetPassword'));
    }

    public function forgetVerify(Request $request, $token)
    {
        $user = DB::table('password_resets')
            ->join('users', 'users.email', '=', 'password_resets.email')
            ->where('token', $token)
            ->select('users.email', 'users.name')
            ->first();
        if (!is_null($user)) {
            return view('auth.passwords.reset')->with(['token' => $token, 'email' => $request->email]);
        } else {
            return back()->with('error', __('Email Not Found'));
        }
    }


    public function forgetVerifyResend(Request $request, $token)
    {
        $user = DB::table('password_resets')->join('users', 'users.email', '=', 'password_resets.email')->where('token', $token)->select('users.email', 'users.name', 'password_resets.otp', 'password_resets.otp_expiry')->first();
        if (getSetting('email_verification_status', 0) == 1) {
            try {
                if (!($user->otp_expiry >= now())) {
                    $otp = rand(1000, 9999);
                    $otp_expiry = now()->addMinutes(5);
                    DB::table('password_resets')->where('token', $token)->update([
                        'otp' => $otp,
                        'otp_expiry' => $otp_expiry,
                    ]);

                    $user->otp = $otp;
                    $user->otp_expiry = $otp_expiry;

                    genericEmailNotify('', $user, NULL, 'password-reset');

                    return redirect()->route('password.reset.verify_form', $token, $user->email)->with('success', __('We have sent a fresh verify email.'));
                } else {
                    return back()->with('success', __('Already send an email. Please wait a minutes to try another'));
                }
                return back()->with('error', __('Verify Your Rest Password'));
            } catch (Exception $e) {
                return back()->with('error', __(SOMETHING_WENT_WRONG));
            }

            return back();
        } else {
            return back();
        }
    }

    public function updatePassword(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        try {
            $user = DB::table('password_resets')
                ->join('users', 'users.email', '=', 'password_resets.email')
                ->where('token', $token)
                ->select('users.email', 'users.name')
                ->first();

            if (!is_null($user) && $user->email == $request->email) {
                User::where('email', $user->email)
                    ->update([
                        'password' => bcrypt($request->password),
                    ]);

                return redirect()->route('login')->with('success', __('Reset Successfully. Please login with new password'));
            } else {
                throw new Exception(__('Email doesn\'t match'));
            }
        } catch (Exception $e) {
            return back()->with('error', $e);
        }
    }

    public function sendForgotMail($email)
    {
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()
        ]);
        $template = EmailAndNotificationTemplate::where([
            'type' => TEMPLATE_TYPE_EMAIL,
            'tenant_id' => DEFAULT_TENANT_ID_SUPER_ADMIN,
            'status' => STATUS_ACTIVE,
            'name' => 'forgot-password',
        ])->first();

        if ($template) {
            $customizedFieldsArray = [
                'app_name' => getSetting('app_name'),
                'app_email' => getSetting('app_email'),
                'link' => route('password.reset.verify', $token),
            ];
            $emailTemplateContent = replaceKeywordForTemplate($template->body, $customizedFieldsArray);
            if ($emailTemplateContent) {
                Mail::to($email)->send(new CommonEmailHandler($template->subject, $emailTemplateContent));
            }
        }
    }

}
