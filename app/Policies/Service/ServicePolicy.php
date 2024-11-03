<?php

namespace App\Policies\Service;

use App\Models\Service\Service;
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

    public function update(User $user, Service $service): bool
    {
        return $user->id === $service->user_id;
    }
    
}
