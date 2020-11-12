<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->isTokenPermitted();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'poll_type_id' => ['required', 'integer'],
        ];
    }
}
