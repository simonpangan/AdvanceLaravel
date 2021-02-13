<?php 

namespace App\Repositories3;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;
}