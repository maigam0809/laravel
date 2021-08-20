<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }


    public function view(User $user, Product $product)
    {
        return true;
    }


    public function create(User $user)
    {
        return $user->role === config('common.users.role.admin');
    }


    public function update(User $user, Product $product)
    {
        return $user->role === config('common.users.role.admin');
    }


    public function delete(User $user, Product $product)
    {
        return $user->role === config('common.users.role.admin');
    }


    public function restore(User $user, Product $product)
    {
        //
    }
    public function forceDelete(User $user, Product $product)
    {
        //
    }
}
