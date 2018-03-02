<?php

namespace App\Support;

use Illuminate\Contracts\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response
{
    private $statusCode = HttpResponse::HTTP_OK;

    private $response;


    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
    }

    /**
     * set http status code.
     *
     * @param int $status
     * @return $this
     */
    public function setStatusCode(int $status)
    {
        $this->statusCode = $status;
        return $this;
    }

    /**
     * get http status code.
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * return  response json data
     * @param  $data
     * @param  array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseJson($data, array $headers = [])
    {
        return $this->response->json($data, $this->statusCode, $headers);
    }

    /**
     * return  response json message
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseMessage(string $message)
    {
        return $this->response->json([
            'message'=>$message
        ], $this->statusCode);
    }

    /**
     * return 201 response with the given created resource.
     * @param   $data
     * @return  \Illuminate\Http\JsonResponse
     */
    public function withCreated($data)
    {
        return $this->setStatusCode(
            HttpResponse::HTTP_CREATED
        )->responseJson($data);
    }

    /**
     * return 204 no content response.
     * @return    \Illuminate\Http\JsonResponse
     */
    public function withNotContent()
    {
        return $this->setStatusCode(
            HttpResponse::HTTP_NO_CONTENT
        )->responseJson([]);
    }

    /**
     * return 205 with reset resource no content response.
     * @return    \Illuminate\Http\JsonResponse
     */
    public function withResetContent()
    {
        return $this->setStatusCode(
            HttpResponse::HTTP_RESET_CONTENT
        )->responseJson([]);
    }


    /**
     * return 410 response with resource perpetual gone.
     *
     * @return    \Illuminate\Http\JsonResponse
     */
    public function withGone($message = 'success delete resource')
    {
        return $this->setStatusCode(
            HttpResponse::HTTP_NO_CONTENT
        )->responseMessage($message);
    }

    /**
     * return 501 response request Not Implemented.
     *
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function withNotImplemented($message)
    {
        return $this->setStatusCode(
            HttpResponse::HTTP_NOT_IMPLEMENTED
        )->responseMessage($message);
    }
}