<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollQuestionStoreRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->canUser('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'poll_id' => ['required', 'integer'],
            'question' => ['required', 'string'],
            'is_int' => ['required', 'boolean'],
        ];
    }
}
