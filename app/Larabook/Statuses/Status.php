<?php namespace Larabook\Statuses;

use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;


class Status extends \Eloquent{

    use EventGenerator;
    /*
     * Fillable fields for a new status
     */
    protected $fillable = ['body'];


    /*
     * A status belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('Laarabook\Users\User');
    }
    /*
     * Publish a new status
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }
}
