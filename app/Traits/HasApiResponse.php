<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

trait HasApiResponse
{
    /**
     * @var array $response
     */
    protected $response = [];

    /**
     * Return a success response
     *
     * @param $message
     * @param array $data
     * @return JsonResponse
     */
    public function successResponse(string $message, $data = []): JsonResponse
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
     * Return a failed response
     *
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function failedResponse(string $message, $data = []): JsonResponse
    {
        $this->response = [
            'status' => 'failed',
            'message' => $message,
        ];

        if (! empty($data)) {
            $this->response['data'] = $data;
        }

        return Response::json($this->response);
    }

    /**
     * Return a resource not found response
     *
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    public function notFoundResponse(string $message, $data = []): JsonResponse
    {
        $this->response = [
            'status' => 'not_found',
            'message' => $message,
        ];

        if (! empty($data)) {
            $this->response['data'] = $data;
        }

        return Response::json($this->response, 404);
    }

    /**
     * Return a form validation error response
     *
     * @param $errors
     * @return JsonResponse
     */
    public function formValidationErrorResponse($errors): JsonResponse
    {
        $this->response = [
            'status' => 'error',
            'message' => 'Whoops! Validation failed!',
            'validationErrors' => $errors,
        ];

        return Response::json($this->response);
    }

    /**
     * Carry out the validation
     *
     * @param $request
     * @return \Illuminate\Contracts\Validation\Validator|JsonResponse
     */
    public function performValidation($request)
    {
        $validation = Validator::make($request->all(), $request->rules(), $request->messages());

        if ($validation->fails()) {
            return $this->formValidationErrorResponse($validation->errors());
        }

        return $validation;
    }
}
