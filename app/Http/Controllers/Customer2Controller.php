<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

use App\Repositories2\RepositoryInterface;

class Customer2Controller extends Controller
{
    // space that we can use the repository from
    protected $model;

    public function __construct(RepositoryInterface $repository)  // Customer $customer
    {
        //new Repository($customer);
        // set the model
        // $this->model = new Repository( new Customer());


        $this->model = $repository;
    }
 
    public function index()
    {
        $all = $this->model->all();
        //return  $all->user;
        return  $all;
       // return $this->model->with('user');
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);
 
        // create record and pass in only fields that are fillable
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }
 
    public function show($id)
    {
        return $this->model->show($id);
    }
 
    public function update(Request $request, $id)
    {
        // update model and only pass in the fillable fields
        $this->model->update($request->only($this->model->getModel()->fillable), $id);
 
        return $this->model->find($id);
    }
 
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
