<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait HasApiResponse
{
    /**
     * @var array $response
     */
    protected $response = [];

    /**
     * @param $message
     * @param array $data
     * @return JsonResponse
     */
    public function successResponse($message, $data = []): JsonResponse
    {
        $this->response = [
            'status' => 'success',
            'message' => $message,
        ];

        if (! empty($data)) {
            $this->response['data'] = $data;
        }

        return Response::json($this->response);
    }

    /**
     * @param $errors
     * @return JsonResponse
     */
    public function formValidationErrorResponse($errors): JsonResponse
    {
        $this->response = [
            'status' => 'failed',
            'message' => 'Whoops! Validation failed!',
            'validationErrors' => $errors,
        ];

        return Response::json($this->response);
    }
}
