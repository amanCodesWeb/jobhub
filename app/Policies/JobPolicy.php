<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function modify(User $user, Job $job): bool
    {
        // Admin can modify any job
        if ($user->isAdmin()) {
            return true;
        }

        // Regular users can only modify their own jobs
        return $user->id === $job->user_id;
    }
}
