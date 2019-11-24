<?php


namespace App\Http\Actions;


use App\Customer;
use App\Traits\HasApiResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteCustomerAction
{
    use HasApiResponse;

    /**
     * Execute action to delete a customer
     *
     * @param Request $request
     * @return JsonResponse|null
     */
    public function execute(Request $request): ?JsonResponse
    {
        $request->validate(
            ['customerId' => 'required'],
            ['customerId.required' => 'Please supply a customer id']
        );

        $customer = Customer::find($request->customerId);

        if (! $customer) {
            return $this->notFoundResponse('Customer data not found in database.');
        }

        DB::beginTransaction();

        try {
            $customer->forceDelete();

            DB::commit();

            return $this->successResponse('Customer has been deleted.');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getTraceAsString());

            return $this->failedResponse("Unable to delete customer: {$exception->getMessage()}");
        }
    }
}
