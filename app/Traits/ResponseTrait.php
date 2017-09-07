<?php

namespace App\Traits;

/* 接口响应处理 */

trait ResponseTrait
{

    //返回状态码
    private $responseCode = [
        'fail' => 'fail',
        'error' => 'error',
        'success' => 'success',
    ];

    private $responseStatus;//浏览器相应码

    /**
     * @desc:   设置响应状态码
     * @date:   2017/6/3
     * @time:   13:42
     * @author: hyb
     * @param:
     * @return: object
     */

    public function setStatus(int $status)
    {
        $this->responseStatus= $status;
        return $this;
    }


    /**
     * @desc:   获取返回状态码
     * @date:   2017/6/3
     * @time:   14:09
     * @author: hyb
     * @return: string
     */
    public function getStatus()
    {
        return $this->responseStatus;
    }

    /**
     * @desc:   响应数据方法
     * @auth:   hyb
     * @date:   2017/9/7
     * @time:   14:58
     * @param:
     * @return:
     */
    public function responseMessage(array $response)
    {
        return response()->json($response,$this->getStatus());
    }

    /**
     * @desc:   请求成功,返回数据
     * @date:   2017/6/3
     * @time:   13:32
     * @author: hyb
     * @param:  $result 返回数据
     * @return: json
     */
    public function successResponse($result, string $message = '请求成功!')
    {
        return response()->json([
            'code' => $this->responseCode['success'],
            'message' => $message,
            'data' => $result
        ]);
    }

    /**
     * @desc:   请求成功
     * @date:   2017/6/3
     * @time:   14:23
     * @author: hyb
     * @param:  返回信息
     * @return: json
     */
    public function errorResponse(string $message = '抱歉,未找到相关数据!')
    {
        return response()->json([
            'code' => $this->responseCode['fail'],
            'message' => $message,
            'data' => []
        ]);
    }
}