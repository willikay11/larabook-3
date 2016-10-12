<?php namespace Larabook\Statuses;

use Larabook\Users\User;

class StatusRepository
{

    public function getAllForUser(User $user)
    {
//        dd($user->statuses);
//        return $user->statuses()->with('user')->latest()->get();
//        return $user->statuses()->get();
        return $user->statuses;
    }
    
    /*
     * Save a new status for a user
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }
}