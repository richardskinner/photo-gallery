<?php

namespace App\Listeners;

use App\Events\DeleteImageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteImageListener
{
    public function handle(DeleteImageEvent $deleteImageEvent)
    {
        $deleteImageEvent->image->delete();
    }
}
