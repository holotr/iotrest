<?php

namespace Someline\Policies;

use Someline\Models\Foundation\User;
use Someline\Models\Foundation\Sensor;
//use Illuminate\Auth\Access\HandlesAuthorization;

class SensorPolicy
{
    //use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function before($user, $ability)
    {
      // if ($user->isAdmin()) {
      //   return true;
      // }
    }
    public function show(User $user, Sensor $sensor)
    {
        return $user->user_id === $sensor->user_id;
    }
    public function update(User $user, Sensor $sensor)
    {
        return $user->user_id === $sensor->user_id;
    }
    public function destroy(User $user, Sensor $sensor)
    {
        return $user->user_id === $sensor->user_id;
    }
    public function store(User $user, Sensor $sensor)
    {
        return $user->user_id === $sensor->user_id;
    }

}
