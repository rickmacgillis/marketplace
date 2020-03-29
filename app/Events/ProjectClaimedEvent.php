<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;

class ProjectClaimedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $project = null;
    
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
}
