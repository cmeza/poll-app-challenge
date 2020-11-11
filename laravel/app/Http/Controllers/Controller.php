<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
