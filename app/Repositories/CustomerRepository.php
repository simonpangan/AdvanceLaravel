<?php

namespace App\Repositories;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        // $customers = Customer::where('active', 1)
        //     ->orderBy('name')
        //     ->with('user')
        //     ->get()
        //     ->map(function($customer){
        //         return $customer->format();
        //     });

        $customers = Customer::where('active', 1)
            ->orderBy('name')
            ->with('user')
            ->get()
            ->map->format();

        return $customers;
    }

    public function findById($customerId)
    {
        $customer = Customer::where('id',$customerId)->where('active', 1)->with('user')->firstOrFail(); 
        return $customer->format();
    }

    public function findByUsername($customerId)
    {
        //
    }

    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();
        $customer->update(request()->only('name'));
    }

    public function delete($customerId)
    {
        $customer = Customer::where('id', $customerId)->delete();
    }
}