<?php

namespace App\Policies;

use App\Models\Cards;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cards  $cards
     * @return mixed
     */
    public function view(User $user, Cards $cards)
    {
        
        return $user->id == $cards->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cards  $cards
     * @return mixed
     */
    public function update(User $user, Cards $cards)
    {
        return $cards = DB::table('cards')->where('user_id', auth()->user()->getAuthIdentifier())->paginate(5);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cards  $cards
     * @return mixed
     */
    public function delete(User $user, Cards $cards)
    {
        return $user->id == $cards->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cards  $cards
     * @return mixed
     */
    public function restore(User $user, Cards $cards)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cards  $cards
     * @return mixed
     */
    public function forceDelete(User $user, Cards $cards)
    {
        //
    }
}
