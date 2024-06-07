<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FrontendSettingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->slug == 'hero section') {
            $rules["title"] = ['bail','required','max:255'];
            $rules["description"] = ['bail','required','max:500'];
        }elseif ($this->slug == 'about us') {
            $rules["section_name"] = ['bail','required'];
            $rules["title"] = ['bail','required','max:255'];
            $rules["description"] = ['bail','required','max:500'];
        }elseif ($this->slug == 'our courses' || $this->slug == 'our gallery') {
            $rules["section_name"] = ['bail','required'];
            $rules["title"] = ['bail','required','max:255'];
            $rules["description"] = ['bail','required','max:500'];
        }elseif ($this->slug == 'our instructor' || $this->slug == 'faq') {
            $rules["title"] = ['bail','required','max:255'];
            $rules["description"] = ['bail','required','max:500'];
        }elseif ($this->slug == 'testimonials' || $this->slug == 'contact us') {
            $rules["section_name"] = ['bail','required'];
            $rules["title"] = ['bail','required','max:255'];
            $rules["description"] = ['bail','required','max:500'];
        }elseif ($this->slug == 'achievement') {
            $rules["slug"] = ['bail','required'];
        }elseif ($this->id) {
            $rules["about_point_1"] = ['max:66'];
            $rules["about_point_2"] = ['max:66'];
            $rules["about_point_3"] = ['max:66'];
        }elseif ($this->achiev_course_completed) {
            $rules["id"] = ['required'];
        }

        return $rules;
    }
}
