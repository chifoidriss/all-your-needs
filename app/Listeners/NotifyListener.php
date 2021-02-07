<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->type == 'store') {
            notify()->success('Stored successful.', $event->message);
        }
        if ($event->type == 'update') {
            notify()->info('Updated successful.', $event->message);
        }
        if ($event->type == 'destroy') {
            notify()->error('Deleted successful.', $event->message);
        }
    }
}
