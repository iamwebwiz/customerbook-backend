<?php


namespace App\Http\Actions;


use App\Customer;
use App\Http\Requests\UpdateCustomerRequest;
use App\Traits\HasApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateCustomerAction
{
    use HasApiResponse;

    /**
     * @param UpdateCustomerRequest $request
     * @return JsonResponse
     */
    public function execute(UpdateCustomerRequest $request): JsonResponse
    {
        $this->performValidation($request);

        $customer = Customer::find($request->customerId);

        DB::beginTransaction();

        try {
            $this->updateCustomerData($request, $customer);

            DB::commit();

            return $this->successResponse('Customer data updated successfully.', $customer);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getTraceAsString());

            return $this->failedResponse("Unable to update customer data: {$exception->getMessage()}");
        }
    }

    private function updateCustomerData($request, $customer)
    {
        $customer->first_name = $request->first_name ?? $customer->first_name;
        $customer->last_name = $request->last_name ?? $customer->last_name;
        $customer->email = $request->email ?? $customer->email;
        $customer->phone = $request->phone ?? $customer->phone;
        $customer->address = $request->address ?? $customer->address;
        $customer->save();

        return $customer;
    }
}
