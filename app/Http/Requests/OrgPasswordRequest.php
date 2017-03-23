<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrgPasswordRequest extends FormRequest
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
            'org_passwd' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'org_passwd.required' => 'You need to specify a password!',
        ];
    }
}
