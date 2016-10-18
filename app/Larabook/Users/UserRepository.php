<?php namespace Larabook\Users;

use Larabook\Users\User;

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
        return User::orderBy('username', 'asc')->paginate($howMany);
    }


    /**
     * Fetch as user by their username
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }


    /**
     * Find a user by Id
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }


    /**
     * Follow a larabook user
     * @param $userIdToFollow
     * @param User $user
     * @return mixed
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }


    /**
     * @param $userIdToUnFollow
     * @param \Larabook\Users\User $user
     * @return mixed
     */
    public function unfollow($userIdToUnFollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnFollow);
    }
}