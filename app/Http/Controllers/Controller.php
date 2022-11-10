<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MainRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function orderItemsInfo(): JsonResponse {
        return response()->json(MainRepository::getOrderItemsData());
    }

    public function santaMemberInfo(Request $request): JsonResponse {
        $id = intval($request->get('id'));
        if (!$id) {
            return $this->jsonError('Wrong id');
        }

        $data = MainRepository::getSantaMemberData($request->get('id'));

        if (!$data) {
            return $this->jsonError('Wrong member id');
        }

        return response()->json($data);
    }

    public function deleteUser(Request $request): JsonResponse {
        $id = intval($request->get('id'));
        if (!$id) {
            return $this->jsonError('Wrong id');
        }

        if (MainRepository::deleteUser($id)) {
            return response()->json(['success' => true]);
        }

        return $this->jsonError('User doesn\'t exist or deletion error');
    }
}
