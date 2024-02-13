<?php

namespace App\Mail;

use App\Models\ArtProjectUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProjectStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $userProject;

    /**
     * Create a new message instance.
     */
    public function __construct(ArtProjectUser $userProject)
    {
        $this->userProject = $userProject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Project Status Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.project_status_updated', // Correct view name
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        // Retrieve the user associated with the pivot table entry
        $user = $this->userProject->user;
    
        // Check if the user exists
        if ($user && $user->email) {
            // If the user exists and has an email address, send the email to their address
            return $this->subject('Project Status Updated')
                        ->view('emails.project_status_updated')
                        ->to($user->email);
        }
    
        // If the user does not exist or does not have an email address, return the Mailable object
        // This ensures that the build() method always returns an instance of the Mailable object
        return $this->subject('Project Status Updated');
    }
}
