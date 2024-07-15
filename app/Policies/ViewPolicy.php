<?php

namespace App\Policies;

use App\Models\User;

class ViewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(){

    }

    public function viewDashboard(User $user)
    {
        return $user->isAdmin();
    }

    public function viewUserOrder(User $user)
    {
        return $user->isUser();
    }
}
