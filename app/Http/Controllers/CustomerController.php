<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index():View
    {
        $customer = Customer::query()
            ->with('salesRep')
//            ->visibleTo(User::class)
            ->orderBy('name')
            ->paginate();
        return view('customers',['customers' => $customer]);
    }
}
