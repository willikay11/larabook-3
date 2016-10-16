<?php namespace Larabook\Registration\Events;

use Larabook\Users\User;

class UserHasRegistered
{

    public $user;

    /**
     * UserRegistered constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


}