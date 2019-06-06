<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function success($data = [], $msg = "成功！", $code = 200, $status = 'success'):JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'msg' => $msg,
            'data' => $this->delNull($data),
        ]);
    }

    public function error($msg = "失败！", $code = 400, $status = 'error'):JsonResponse
    {
        return response()->json([
            'code' => $code,
            'status' => $status,
            'msg' => $msg
        ]);

    }

    private function delNull($arr)
    {
        if (is_array($arr)) {
            $tmp = [];
            foreach ($arr as $key => $value) {
                if (is_array($value)) {
                    $tmp[$this->convertUnderline($key)] = $this->delNull($value);
                } else {
                    $tmp[$this->convertUnderline($key)] = $value ?? '';
                }
            }

            return $tmp;
        } else {
            return $this->convertUnderline($arr);
        }
    }
}
