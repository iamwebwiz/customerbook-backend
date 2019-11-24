<?php


namespace App\Http\Actions;


use App\Customer;
use App\Http\Requests\FetchSingleCustomerRequest;
use App\Traits\HasApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class FetchSingleCustomerAction
{
    use HasApiResponse;

    /**
     * Execute the action to get a single customer
     *
     * @param FetchSingleCustomerRequest $request
     * @return JsonResponse
     */
    public function execute(FetchSingleCustomerRequest $request): ?JsonResponse
    {
        try {
            $customer = $this->fetchCustomer($request);

            return $this->successResponse('Customer data fetched successfully', [
                'customer' => $customer
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return $this->failedResponse("Unable to retrieve customer data: {$exception->getMessage()}");
        }
    }

    /**
     * Fetch the customer from database
     *
     * @param $request
     * @return mixed
     */
    private function fetchCustomer($request)
    {
        $customer = Customer::find($request->customerId);

        abort_if($customer === null, 404, 'Customer does not exist in database');

        return $customer;
    }
}
