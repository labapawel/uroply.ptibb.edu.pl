<?php

namespace App\Admin\Policies;

use App\Admin\Sections\Holidays;
use App\Models\User;
use App\Models\Holiday;
use Illuminate\Auth\Access\HandlesAuthorization;

class HolidaysSectionModelPolicy
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
    public function before(User $user, $ability, Holidays $section, Holiday $item = null)
    {
    // dd($ability);
        return true;
 
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, Holidays $section, Holiday $item)
    {


        return $user;
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
    * @param Holiday $item
     *
     * @return bool
     */
    public function delete(User $user, Holidays $section, Holiday $item)
    {
        return true;
    }
    public function create(User $user, Holidays $section, Holiday $item)
    {
        return true;
    }
}