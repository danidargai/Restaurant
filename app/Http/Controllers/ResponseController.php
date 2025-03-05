<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;



class ResponseController extends Controller
{

    public function sendResponse($data, $message)
    {

        $response = [
            "success" => true,
            "data" => $data,
            "message" => $message
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {

        $response = [

            "success" => false,
            "error" => $error
        ];

        if (!empty($errorMessages)) {

            $response["message"] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}