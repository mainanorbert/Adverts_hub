<?php

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DevicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $user === auth()->user();
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Device $device)
    {
        //
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
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Device $product)
    {
        return $user->id === $product->user_id

            ? Response::allow()
            : Response::deny('You did not create this product');
        
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Device $product)
    {
        return $user->id == $product->user_id;
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Device $device)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Device $device)
    {
        //
    }
}
