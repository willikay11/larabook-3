<?php namespace Larabook\Statuses;

class PublishStatusCommand
{

    public $body;
    public $userId;

    /**
     * RegisterUserCommand constructor.
     * @param $username
     * @param $email
     * @param $password
     */
    public function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }


}