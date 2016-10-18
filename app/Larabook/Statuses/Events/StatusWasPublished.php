<?php namespace Larabook\Statuses\Events;

class StatusWasPublished
{

    public $body;

    /**
     * StatusWasPublished constructor.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }


}