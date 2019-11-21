<?php


namespace App\Http\Actions;


use Illuminate\Http\Request;

class ListCustomersAction
{
    public function execute(Request $request)
    {
        return $request->except(['_token']);
    }
}
