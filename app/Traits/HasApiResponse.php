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
     * Return a failed response
     *
     * @param $message
     * @param array $data
     * @return JsonResponse
     */
    public function failedResponse($message, $data = []): JsonResponse
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
     * Return a form validation error response
     *
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
