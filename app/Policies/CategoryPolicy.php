<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return mixed
     */
    public function view(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can create blog categories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the blog category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return mixed
     */
    public function update(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can delete the blog category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return mixed
     */
    public function delete(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can restore the blog category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return mixed
     */
    public function restore(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blog category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return mixed
     */
    public function forceDelete(User $user, BlogCategory $blogCategory)
    {
        //
    }
}
