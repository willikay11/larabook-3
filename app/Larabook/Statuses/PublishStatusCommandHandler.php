<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
//use Larabook\Statuses\PublishStatusCommand;

class PublishStatusCommandHandler implements CommandHandler
{

    use DispatchableTrait;

    protected  $statusRepository;

    /**
     * PublishStatusCommandHandler constructor.
     * @param $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $status = $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);

        return $status;
    }


}