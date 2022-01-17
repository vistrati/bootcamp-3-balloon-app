<?php

namespace App\Services;

use App\Models\User;

trait UserRepresentationTrait
{
    protected function identifyUserRepresentation(?User $user): string
    {
        return $user ? "User with id {$user->id}" : 'Unknown User';
    }
}
