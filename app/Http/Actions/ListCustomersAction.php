<?php


namespace App\Http\Actions;


use App\Customer;
use App\Traits\HasApiResponse;
use Illuminate\Http\JsonResponse;

class ListCustomersAction
{
    use HasApiResponse;

    /**
     * @return JsonResponse
     */
    public function execute(): JsonResponse
    {
        $customers = Customer::all();

        return $this->successResponse('Customers fetched successfully.', $customers);
    }
}
