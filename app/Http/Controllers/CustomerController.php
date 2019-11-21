<?php

namespace App\Http\Controllers;

use App\Http\Actions\ListCustomersAction;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function fetchCustomers(Request $request)
    {
        return (new ListCustomersAction())->execute($request);
    }
}
