<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    private $customerRepository;
    
    // public function __construct(CustomerRepository $customerRepository)
    // { 
    //     $this->customerRepository = $customerRepository;
    // }

    // public function __construct(CustomerRepositoryInterface $customerRepository)
    // { 
    //     $this->customerRepository = $customerRepository;
    // }

    public function __construct()
    { 
        $this->customerRepository = new CustomerRepository();
    }

    public function index()
    {
        return $customers = $this->customerRepository->all();
    }

    public function show($customerId)
    {
        return $customers = $this->customerRepository->findById($customerId);  
    }

    public function update($customerId)
    {
         $customers = $this->customerRepository->update($customerId);  
         return redirect('/customer/' . $customerId);
    }

    public function destroy($customerId)
    {
        $this->customerRepository->delete($customerId);  
        return redirect('/customer');
    }
}
