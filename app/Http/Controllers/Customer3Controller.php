<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories3\UserRepositoryInterface;
use App\Repositories3\Eloquent\UserRepository;

class Customer3Controller extends Controller
{
    // space that we can use the repository from
    private  $userRepository;

    public function __construct(UserRepository $user)  // Customer $customer
    {
        $this->userRepository = $user;
    }

    public function index()
    {
        $user = $this->userRepository->all();
        return  $user;
    }
 
}
