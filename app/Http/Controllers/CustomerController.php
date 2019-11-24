<?php

namespace App\Http\Controllers;

use App\Http\Actions\DeleteCustomerAction;
use App\Http\Actions\FetchSingleCustomerAction;
use App\Http\Actions\ListCustomersAction;
use App\Http\Actions\StoreCustomerAction;
use App\Http\Actions\UpdateCustomerAction;
use App\Http\Requests\FetchSingleCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Fetch all customers
     *
     * @return JsonResponse
     */
    public function fetchCustomers(): JsonResponse
    {
        return (new ListCustomersAction())->execute();
    }

    /**
     * Store a new customer to the database
     *
     * @param StoreCustomerRequest $request
     * @return JsonResponse
     */
    public function storeCustomer(StoreCustomerRequest $request): JsonResponse
    {
        return (new StoreCustomerAction())->execute($request);
    }

    /**
     * Get the data of a single customer
     *
     * @param FetchSingleCustomerRequest $request
     * @return JsonResponse|null
     */
    public function fetchSingleCustomer(FetchSingleCustomerRequest $request): ?JsonResponse
    {
        return (new FetchSingleCustomerAction())->execute($request);
    }

    /**
     * @param UpdateCustomerRequest $request
     * @return JsonResponse
     */
    public function updateCustomer(UpdateCustomerRequest $request): JsonResponse
    {
        return (new UpdateCustomerAction())->execute($request);
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function deleteCustomer(Request $request): ?JsonResponse
    {
        return (new DeleteCustomerAction())->execute($request);
    }
}
