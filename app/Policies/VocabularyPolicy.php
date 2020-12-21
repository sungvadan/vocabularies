<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Auth\Access\HandlesAuthorization;

class VocabularyPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return mixed
     */
    public function view(User $user, Vocabulary $vocabulary)
    {
        return $vocabulary->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return mixed
     */
    public function update(User $user, Vocabulary $vocabulary)
    {
        return $vocabulary->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return mixed
     */
    public function delete(User $user, Vocabulary $vocabulary)
    {
        return $vocabulary->user->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return mixed
     */
    public function restore(User $user, Vocabulary $vocabulary)
    {
        return $vocabulary->user->is($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return mixed
     */
    public function forceDelete(User $user, Vocabulary $vocabulary)
    {
        return $vocabulary->user->is($user);
    }
}
