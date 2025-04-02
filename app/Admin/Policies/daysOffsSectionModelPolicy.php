<?php

namespace App\Admin\Policies;

use App\Admin\Sections\DaysOffs;
use App\Models\User;
use App\Models\daysOff;
use Illuminate\Auth\Access\HandlesAuthorization;

class daysOffsSectionModelPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function before(User $user, $ability, DaysOffs $section, DaysOff $item = null)
    {
    // dd($ability);
        return $user->isAdmin();
 
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, DaysOffs $section, DaysOff $item)
    {


        return $user->isAdmin();
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function edit($user,  $section,  $item)
    {
     //   \Log::info('User ID: ' . $user->id);
        return true;
    }

    /**
     * @param User $user
     * @param Users $section
    * @param DaysOff $item
     *
     * @return bool
     */
    public function delete(User $user, DaysOffs $section, DaysOff $item)
    {
        return true;
    }
    public function create(User $user, DaysOffs $section, DaysOff $item)
    {
        return true;
    }
}