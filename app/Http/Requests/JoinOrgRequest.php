<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinOrgRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'github_username'      => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'github_username.required'      => 'You need to specify an username.',
        'g-recaptcha-response.required' => 'You need to prove you are not a robot.',
        ];
    }
}
