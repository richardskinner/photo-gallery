<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ImageUploadStoredEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('stored@photo-gallery.com', 'Photo Gallery'),
            subject: 'Image Upload Stored Email',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.image.stored',
            with: ['user' => $this->user]
        );
    }

    public function attachments()
    {
        return [];
    }
}
