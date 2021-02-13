<?php namespace App\Repositories3\Eloquent;

use App\Models\Customer;
use App\Repositories3\Eloquent\BaseRepository;
use App\Repositories3\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
   /**
    * UserRepository constructor.
    *
    * @param Customer $model
    */
    //can change to generic Model like in the parent class for reusability
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->model->all();    
    }
}