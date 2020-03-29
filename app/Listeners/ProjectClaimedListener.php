<?php

namespace App\Listeners;

use App\Events\ProjectClaimedEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectClaimedEmail;

class ProjectClaimedListener
{
    public function handle(ProjectClaimedEvent $event)
    {
        $client = $event->project->owner()->get();
        Mail::to($client)->send(new ProjectClaimedEmail($event->project));
    }
}
