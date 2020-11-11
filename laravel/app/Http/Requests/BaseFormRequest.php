<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BaseFormRequest extends FormRequest
{
    /**
     * @param string $action
     */
    public function canUser(string $action)
    {
        // check if the action is valid for this token (check action spelling?)
        if (! Auth::user()->tokenCan($action)) {
            abort(403, "Unauthorized or unknown action for token: {$action}");
        }

        return true;
    }
}
