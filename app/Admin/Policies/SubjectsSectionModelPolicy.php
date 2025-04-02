<?php

namespace App\Admin\Policies;

use App\Admin\Sections\Subjects;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectsSectionModelPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Subjects $section
     * @param Subject $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Subjects $section, Subject $item = null)
    {
            return true;
    }

    /**
     * @param User $user
     * @param Subjects $section
     * @param Subject $item
     *
     * @return bool
     */
    public function display(User $user, Subjects $section, Subject $item)
    {
        return true;
    }

    /**
     * @param User $user
     * @param Subjects $section
     * @param Subject $item
     *
     * @return bool
     */
    public function edit(User $user, Subjects $section, Subject $item)
    {
    //    dd(auth()->user()->isAdmin);
        return auth()->user()->isAdmin;
    }

    /**
     * @param User $user
     * @param Subjects $section
     * @param Subject $item
     *
     * @return bool
     */
    public function delete(User $user, Subjects $section, Subject $item)
    {
        return auth()->user()->isAdmin;
    }
    public function create(User $user, Subjects $section, Subject $item)
    {
        return auth()->user()->isAdmin;
    }
}