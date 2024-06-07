<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingConfigurationRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'config_type' => 'required',
        ];

        if ($this->config_type == 'email_config') {
            $rules['MAIL_MAILER'] = 'bail|required';
            $rules['MAIL_HOST'] = 'bail|required';
            $rules['MAIL_PORT'] = 'bail|required';
            $rules['MAIL_USERNAME'] = 'bail|required';
            $rules['MAIL_PASSWORD'] = 'bail|required';
            $rules['MAIL_ENCRYPTION'] = 'bail|required';
            $rules['MAIL_FROM_ADDRESS'] = 'bail|required';
            $rules['MAIL_FROM_NAME'] = 'bail|required';
        } else if ($this->config_type == 'email_test') {
            $rules['email_address'] = 'bail|required';
            $rules['email_subject'] = 'bail|required';
            $rules['email_body'] = 'bail|required';
        }else if ($this->config_type == 'google_analytics_config') {
            $rules['google_analytics_tracking_id'] = 'bail|required';
        }else if ($this->config_type == 'config_type') {
            $rules['cookie_consent_config'] = 'bail|required';
        }
        return $rules;
    }

}
