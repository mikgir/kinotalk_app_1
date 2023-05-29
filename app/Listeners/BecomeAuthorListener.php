<?php

namespace App\Listeners;

use App\Events\BecomeAuthor;
use App\Mail\BecomeAuthor as BecomeAuthorMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class BecomeAuthorListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BecomeAuthor $event): void
    {
        Mail::to('kinotalkapp@gmail.com')->send(new BecomeAuthorMail($event->user));


    }
}
