<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomMessageRequest extends FormRequest
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
        $this->sanitize();

        return [
            'message' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $message = $input['message'];
        if (! empty($message)) {
            $message = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $message);
            $message = htmlspecialchars(strip_tags($message));
            $message = str_replace('\'', '"', $message);
            $input['message'] = $message;
        }
        $this->replace($input);
    }
}
