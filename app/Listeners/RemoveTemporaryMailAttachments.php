<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\Part\DataPart;

class RemoveTemporaryMailAttachments
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $this->removeFileIfExists($event);
    }

    protected function removeFileIfExists(MessageSent $event)
    {
        foreach ($event->message->getAttachments() as $attachment) {
            if ($attachment instanceof DataPart) {
                $file_name = $attachment->getFilename() ?? '';
                if (Storage::exists($file_name)) {
                    Storage::delete($file_name);
                }
            }
        }
    }
}
