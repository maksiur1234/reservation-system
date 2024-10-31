<?php

namespace App\Policies\Service;

use App\Models\User;

class ServicePolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user): bool
    {
        return $user->account_type === 'company' || $user->account_type === 'admin';
    }
}
