<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
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
