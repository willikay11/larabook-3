<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

class UnfollowUserCommandHandler implements CommandHandler
{

    protected  $userRepo;
    /**
     * UnfollowUserCommandHandler constructor.
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);

        $this->userRepo->unfollow($command->userIdToUnfollow, $user);
    }


}