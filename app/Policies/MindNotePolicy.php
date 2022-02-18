<?php

namespace App\Policies;

use App\Models\MindNote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MindNotePolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MindNote  $mindNote
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MindNote $mindNote)
    {
        return $mindNote->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MindNote  $mindNote
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MindNote $mindNote)
    {
        return $mindNote->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MindNote  $mindNote
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MindNote $mindNote)
    {
        return $mindNote->user->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MindNote  $mindNote
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MindNote $mindNote)
    {
        return $mindNote->user->is($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MindNote  $mindNote
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MindNote $mindNote)
    {
        return $mindNote->user->is($user);
    }
}
