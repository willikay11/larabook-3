<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;

class LeaveCommentOnStatusCommandHandler implements CommandHandler
{

    private $statusRepository;
    /**
     * LeaveCommentOnStatusCommandHandler constructor.
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /**
     * Handle the command.x
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {

        $comment = $this->statusRepository->leaveComment($command->user_id, $command->status_id, $command->body);

        return $comment;
    }

}