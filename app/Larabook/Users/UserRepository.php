<?php
/**
 * Created by PhpStorm.
 * User: mac-intern
 * Date: 9/26/16
 * Time: 7:57 PM
 */

namespace Larabook\Users;


class UserRepository
{

    /**
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }


    /**
     * Paginate users
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }


    /**
     * Fetch as user by their username
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with(['statuses' => function($query)
        {
                $query->latest();
        }])->whereUsername($username)->first();
    }
}