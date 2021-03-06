<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use Helpers;

    /**
     * 检查输入源
     * @param $request
     * @param $data
     * @return mixed
     */
    public function checkValidator($request, $data = [])
    {
        $validator = Validator::make($request, $data);
        if ($validator->fails()) {
            return $this->errorBadRequest($validator->messages());
        }
        return '';
    }

    /**
     * 返回错误的请求
     * @param string $message
     * @return mixed
     */
    protected function errorBadRequest($message = '')
    {
        return $this->response->array($message)->setStatusCode(200);
    }

    /**
     * 正常response
     *
     * @param $result
     * @param $message
     * @return mixed
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return $this->response->array($response,$message);
    }

    /**
     * 错误response
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return mixed
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return $this->response->array($response,$code);
    }
}
