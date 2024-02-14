<?php

namespace App\Policies;

use App\Models\ArtProject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArtProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */

     use HandlesAuthorization;
     public function viewAny(User $user)
     {
         return $user->isAdmin(); 
     }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ArtProject $artProject)
    {
        return $user->isAdmin() || $user->hasPermissionTo('view', $artProject); 
    }

    /**
     * Determine whether the user can create models.
     */


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ArtProject $artProject)
    {
        return $user->isAdmin() || $user->hasPermissionTo('update', $artProject);
    }

    /**
     * Determine whether the user can delete the model.
     */
   

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ArtProject $artProject): bool
    {
        return $user->isAdmin() || $user->hasPermissionTo('restore', $artProject);

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
}
