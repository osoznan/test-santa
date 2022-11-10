<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as ParentController;

class BaseController extends ParentController {

    public function jsonSuccess($message): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function jsonError($message): JsonResponse {
        return response()->json([
            'error' => true,
            'message' => $message
        ]);
    }

}
