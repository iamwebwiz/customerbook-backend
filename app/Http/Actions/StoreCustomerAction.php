<?php


namespace App\Http\Actions;


use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Traits\HasApiResponse;
use Illuminate\Http\JsonResponse;

class StoreCustomerAction
{
    use HasApiResponse;

    /**
     * Execute creating a new customer
     *
     * @param StoreCustomerRequest $request
     * @return JsonResponse
     */
    public function execute(StoreCustomerRequest $request): JsonResponse
    {
        $customer = Customer::create($request->except('_token'));

        return $this->successResponse('Customer created successfully', [
            'customer' => $customer
        ]);
    }
}
