<?php

namespace App\Admin\Policies;

use App\Admin\Sections\HolidayTypes;
use App\Models\User;
use App\Models\HolidayType;
use Illuminate\Auth\Access\HandlesAuthorization;

class HolidayTypesSectionModelPolicy
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
    public function before(User $user, $ability, HolidayTypes $section, HolidayType $item = null)
    {
    // dd($ability);
        return $user->isSuperAdmin();
 
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, HolidayTypes $section, HolidayType $item)
    {


        return $user->isSuperAdmin();
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
    * @param HolidayType $item
     *
     * @return bool
     */
    public function delete(User $user, HolidayTypes $section, HolidayType $item)
    {
        return true;
    }
    public function create(User $user, HolidayTypes $section, HolidayType $item)
    {
        return true;
    }
}