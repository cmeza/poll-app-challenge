<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollResultCreateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->canUser('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // TODO add validation for unique constraint
            'poll_id' => ['required', 'integer'],
            'poll_question_id' => ['required', 'integer'],
            'value' => ['required', 'integer'],
        ];
    }
}
