<?php

namespace App\Http\Controllers;

use App\Http\Actions\ListCustomersAction;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function fetchCustomers()
    {
        return (new ListCustomersAction())->execute();
    }
}
