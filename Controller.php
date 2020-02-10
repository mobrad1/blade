<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendResponse($result, $message,$view = null)
    {
        if(request()->expectsJson()){

            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];
            return response()->json($response, 200);
        }else{
            return redirect()->back()->with('success',$message);
        }
    }
    public function sendError($error, $errorMessages = [], $code = 422)
    {
        if(request()->expectsJson()){
            $response = [
                'success' => false,
                'message' => $error,
            ];
            if (!empty($errorMessages)) {
                $response['data'] = $errorMessages;
            }
            return response()->json($response, $code);
        }
        else{
            return redirect()->back()->with('error',$errorMessages);
        }
    }
}
