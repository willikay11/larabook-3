<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{


    /**
     * Display how long its been since the post was submitted
     * @return mixed
     */

    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
}
