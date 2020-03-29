<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Project;

class ProjectClaimedEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $project = null;
    
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function build()
    {
        $client = $this->project->owner()->first();
        $contractor = $this->project->contractor()->first();
        return $this->view('email.project-claimed')->with([
            'client' => $client->name,
            'contractor' => $contractor->name,
            'projectTitle' => $this->project->title,
        ]);
    }
}
