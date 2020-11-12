<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BaseFormRequest extends FormRequest
{
    /**
     * @param string $action
     * @return bool
     */
    public function isTokenPermitted()
    {
        $action = $this->getAction();

        // check if the action is valid for this token (check action spelling?)
        if (! Auth::user()->tokenCan($action)) {
            abort(403, "Unauthorized or unknown action for token: {$action}");
        }

        return true;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        // to make request support create (aka store) & update, we need to map the route name to a token permission
        $action = explode('.', Route::currentRouteName())[1];

        return ($action === 'store') ? 'create' : $action;
    }
}
