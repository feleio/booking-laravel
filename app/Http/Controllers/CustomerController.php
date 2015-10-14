<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->customer_key = str_random(10);
        $customer->name = $this->getMandate($request, 'name');
        $customer->tel = $this->getMandate($request, 'tel');
        $customer->save();

        return $customer;
    }

}
