<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetTeamRequest extends FormRequest
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
            'team_id' => 'required|filled|integer|exists:teams,id',
        ];
    }

    public function messages()
    {
        return [
        'team_id.required' => 'You need to select a team.',
        'team_id.integer'  => 'The Team ID must be a number.',
        'team_id.exists'   => "The selected team doesn't exist.",
        ];
    }
}
