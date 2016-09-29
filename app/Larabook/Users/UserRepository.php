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
    public function save(User $user)
    {
        return $user->save();
    }
}