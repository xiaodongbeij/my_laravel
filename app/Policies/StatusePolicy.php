<?php

namespace App\Policies;

use App\Models\Statuse;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Statuse $statuse)
    {
        return $user->id === $statuse->user_id;
    }
}
