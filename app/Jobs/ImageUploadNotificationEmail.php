<?php

namespace App\Jobs;

use App\Mail\ImageUploadStoredEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ImageUploadNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function handle()
    {
        Mail::to('richard.skinner@gunpowderdigital.com')->send(new ImageUploadStoredEmail($this->user));
    }
}
