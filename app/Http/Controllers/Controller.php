<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * *公共回调方法
     * @param string $status 状态码
     * @param string $message 状态说明
     * @param array $data 返回参数
     * @return   json                            回调返回json
     */
    public function showMsg($status, $message = '', $data = array())
    {
        if (!is_numeric($status) || !is_string($message)) return '';
        $arr = array('status' => $status, 'msg' => $message, 'data' => $data);
        return json_encode($arr);
        die;
    }
}
