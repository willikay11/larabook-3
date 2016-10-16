<?php namespace Larabook\Users;


trait FollowableTrait
{

    /**
     * Get the list of the users that the current user follows
     * @return mixed
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }


    /**
     *Get the list of users who follow the current users
     */
    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();
    }


    /**
     * Determine is a user follows another
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

}